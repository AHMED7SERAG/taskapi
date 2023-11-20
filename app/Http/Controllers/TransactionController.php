<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } // end of __construct

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $users = User::pluck('name' ,'id')->toArray();
        if ($request->ajax()) {
            $data = Transaction::query();
            return DataTables::of($data)
                ->editColumn('amount', function ($row) {
                    return $row->amount ?? '';
                })
                ->editColumn('payer', function ($row) {
                    return $row->payerUser->name?? '';
                })
                ->editColumn('due_on', function ($row) {
                    return $row->due_on ?? '';
                })
                ->editColumn('vat', function ($row) {
                    return $row->vat ?? '';
                })
                ->editColumn('is_vat_inclusive', function ($row) {
                    if($row->is_vat_inclusive){
                        return __('general.yes');
                    }
                    return  __('general.no');
                })
                ->addColumn('status', function ($row) {
                    return $row->status ?? '';
                })
                ->addColumn('actions', function ($row){
                    $btn = '<a href="'. route('transaction.edit', $row->id) .'" class="btn btn-success btn-sm"><i class=" fas  fa-edit"></i> </a>';
                    $btn .= '<a href="'. route('payment.create', $row->id) .'" class="btn btn-info  btn-sm ml-1 mr-1"><i class=" fa fa-credit-card"></i> </a>';

                    $btn .= '<a href="'. route('transaction.show', $row->id) .'" class="btn btn-primary btn-sm ml-1 mr-1"><i class="fas  fa-eye"></i> </a>';
                    $btn .= '<form action="'. route('transaction.destroy', $row->id) .'" class="my-1 my-xl-0" method="post" style="display: inline-block;">';
                    $btn .= '<input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="'.csrf_token().'">';
                    $btn .= '<button type="submit" class="btn btn-danger btn-sm ml-1 mr-1 btn-jinja-delete"><i class="fas  fa-trash"></i> </button>';
                    $btn .= '</form>';
                    return $btn;
                })

                ->filterColumn('is_vat_inclusive', function ($query, $keyword) {
                    $query->where('is_vat_inclusive', $keyword)->get();
                })
                ->filterColumn('status', function ($query, $keyword) {
                    $query->where('status', $keyword)->get();
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('transaction.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $customers = User::get()->pluck('name','id');
        return view('transaction.create', compact(['customers']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $Rules = [
            'amount' => 'required|numeric',
            'payer' => 'required',
            'due_on' => 'required|date',
            'vat' => 'required|numeric',
            'is_vat_inclusive' => 'required|boolean',
        ];
        $validator = Validator::make($request->all(),$Rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        Transaction::create($request->all());
        return redirect('transaction')->with('success',  __('general.added_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
       $transaction = Transaction::with('payments')->findOrFail($id);
        return view('transaction.show', compact(['transaction']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
       $transaction = Transaction::findOrFail($id);
       $customers = User::get()->pluck('name','id');
        return view('transaction.edit', compact(['transaction','customers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $Rules = [
            'amount' => 'required|numeric',
            'payer' => 'required|string',
            'due_on' => 'required|date',
            'vat' => 'required|numeric',
            'is_vat_inclusive' => 'required|boolean',
        ];
        $validator = Validator::make($request->all(),$Rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $requestData = $request->all();
       $Transaction = Transaction::findOrFail($id);

       $Transaction->update($requestData);

        return redirect('transaction')->with('success',  __('general.added_successfully'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
       $Transaction = Transaction::findOrFail($id);
        if ($Transaction) {
            Transaction::destroy($id);
            return redirect('transaction')->with('success', __('general.deleted_successfully'));
        } else {
            return redirect()->back()->with('error', __('document-storing-places.there-is-data-related-on'));
        }
    }

 // end of bulkDelete
}
