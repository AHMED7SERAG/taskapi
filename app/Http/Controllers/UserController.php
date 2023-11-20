<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } // end of __construct

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest();
            return DataTables::of($data)
                ->addColumn('roles', function ($row) {
                        return implode(', ', $row->roles->pluck('label')->toArray());
                })
                ->addColumn('actions','users.datatables.actions')
                ->filterColumn('roles', function ($query, $keyword) {

                    $query->whereHas('roles', function($q) use ($keyword){
                        $q->where('id' , $keyword);
                    })->get();

                    //dd($query->toSql());



                    //$query->where('df_state_id', $keyword)->orderBy('id', 'DESC')->get();
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $user = new User();
        $roles = Role::select('label', 'name')->get()->pluck('label', 'name');
        $jobs = Job::pluck('name', 'id')->toArray();

        $languages = \App\Models\Language::select('code', 'name', 'id')->get();
        return view('users.create', compact('roles',  'user', 'jobs', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $model = new User();
        $transFields = $model->getTranslatableFields();
        $allFieldLangs = \App\Helpers\GettingMultiLanguagesFields::getAllFieldLangs($transFields);

        $RulesTranslatable = [
            'full_name' => '|min:3|string',
        ];

        $validationRulesTranslatable = \App\Helpers\ValidationRules::getValidation(['full_name'], $RulesTranslatable);

        $Rules = [
            'username' => 'required|unique:users,username|max:255|min:3',
            'email' => 'required|string|max:255|email|unique:users,email',
            'password' => 'required',
            'job_id' => 'required',
            'max_missions' => 'required|numeric|gt:-1'
        ];
        $messages = [
            'name' => __('validation/users.name'),
            'max_missions' => __('validation/users.max_missions'),
            'full_name_ar' => __('validation/users.full_name_ar'),
        ];

        $validator = Validator::make($request->all(), array_merge($Rules, $validationRulesTranslatable), $messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $requestData = $request->all();

        $requestExceptData = $request->except($allFieldLangs);
        $requestTranslatableData = $request->only($allFieldLangs);
        if (count($requestTranslatableData) > 0) {
            $requestTranslatableData = \App\Helpers\GettingMultiLanguagesFields::getMultiLanguage(['full_name'], $requestTranslatableData);
            $requestData = array_merge($requestExceptData, $requestTranslatableData);
        }
        if ($request->has('password')) {
            $requestData['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('avatar_url')) {
            $requestData['avatar_url'] = $request->file('avatar_url')
                ->store('uploads', 'public');
        }

        $user = User::create($requestData);
        if (is_array($request->roles) || is_object($request->roles)) {
            foreach ($request->roles as $role) {
                $user->assignRole($role);
            }
        }
        return redirect('admin/users')->with('success', __('general.added_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $languages = \App\Models\Language::select('code', 'name', 'id')->get();
        return view('users.show', compact('user', 'languages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $roles = Role::select('label', 'id')->get()->pluck('label', 'id');
        $jobs = Job::pluck('name', 'id')->toArray();

        $languages = \App\Models\Language::select('code', 'name', 'id')->get();



        $user = User::with('roles')->select('id', 'full_name', 'username', 'email', 'max_missions', 'job_id')->findOrFail($id);
        $user_roles = [];
        foreach ($user->roles as $role) {
            $user_roles[] = $role->name;
        }

        return view('users.edit', compact('user', 'roles', 'user_roles', 'jobs',  'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int      $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        $model = new User();
        $transFields = $model->getTranslatableFields();
        $allFieldLangs = \App\Helpers\GettingMultiLanguagesFields::getAllFieldLangs($transFields);

        $RulesTranslatable = [
            'full_name' => '|min:3|string',
        ];

        $validationRulesTranslatable = \App\Helpers\ValidationRules::getValidation(['full_name'], $RulesTranslatable);

        $Rules = [
            'username' => 'required|unique:users,username,'.$id.'|max:255|min:3',
            'email' => 'required|string|max:255|email|unique:users,email,'.$id,
            'job_id' => 'required',
            'max_missions' => 'required|numeric|gt:-1'
        ];
        $messages = [
            'name' => __('validation/users.name'),
            'max_missions' => __('validation/users.max_missions'),
            'full_name_ar' => __('validation/users.full_name_ar'),
        ];
        $validator = Validator::make($request->all(), array_merge($Rules, $validationRulesTranslatable), $messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }


        $requestData = $request->except(['password']);
        if ($request->has('password') && $request->password != null) {
            $requestData['password'] = bcrypt($request->password);
        }

        $user = User::findOrFail($id);
        //        dd($request->all());
        $user->update($requestData);
        $user->syncRoles($request->roles);

        //        dd($user->syncRoles($request->roles));
        //            $user->assignRole($role);


        return redirect('admin/users')->with('flash_message', __('general.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('admin/users')->with('flash_message', __('general.deleted_successfully'));
    }

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $data = User::FindOrFail($recordId);
            $data->delete();
        } //end of for each

        return redirect('admin/users')->with('flash_message', __('general.deleted_successfully'));
    } // end of bulkDelete

    public function change_password(Request $request, User $user)
    {


       $validator= Validator::make( $request->all(),[
        'password' => 'required|confirmed|min:6',
       ]);
        $requestData = $request->all();
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->has('password') && $request->password != null) {
            $requestData['password'] = bcrypt($request->password);
        }
        $user->update($requestData);

        return redirect('admin/users')->with('success', __('general.updated_successfully'));
    }

    public function edit_password($id)
    {
        return view('users.editPassword',compact('id'));
    }
}
