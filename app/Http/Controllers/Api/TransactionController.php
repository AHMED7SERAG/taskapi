<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;

use App\Http\Requests;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{


    public function index(Request $request)
    {
        $user = auth('sanctum')->user();
        // Check user role and fetch transactions accordingly
        $transactions =   $user->isAdmin() ? Transaction::all() : $user->transactions;
            $data = [
                'transactions' => $transactions,
                'message' => "Success"
    
            ];
        return response()->json(['data' => $transactions]);
    }

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
            return response()->json(['error' => $validator->errors()], 422);
        }
        $transaction = new Transaction($request->all());

        // Set the transaction status based on due date and total paid amount
        $this->updateTransactionStatus($transaction);

        $transaction->save();
        $data = [
            'transaction' => $transaction,
            'message' => "Success"

        ];
        return response()->json(['data' => $data], 201);
    }

    private function updateTransactionStatus(Transaction $transaction)
    {
        $currentDate = Carbon::now();
        $dueDate = Carbon::parse($transaction->due_on);

        if ($transaction->total_paid >= $transaction->amount) {
            $transaction->status = 'Paid';
        } elseif ($dueDate->lt($currentDate)) {
            $transaction->status = 'Overdue';
        } else {
            $transaction->status = 'Outstanding';
        }
    }
    public function generateMonthlyReport(Request $request)
    {
        // Validate request
            $validator = Validator::make($request->all(), [
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

        // Generate monthly report using a single query
        $report = DB::table('transactions')
            ->select(
                DB::raw('MONTH(due_on) as month'),
                DB::raw('YEAR(due_on) as year'),
                DB::raw('SUM(CASE WHEN status = "Paid" THEN amount ELSE 0 END) as paid'),
                DB::raw('SUM(CASE WHEN status = "Outstanding" THEN amount ELSE 0 END) as outstanding'),
                DB::raw('SUM(CASE WHEN status = "Overdue" THEN amount ELSE 0 END) as overdue')
            )
            ->whereBetween('due_on', [$request->input('start_date'), $request->input('end_date')])
            ->groupBy(DB::raw('YEAR(due_on)'), DB::raw('MONTH(due_on)'))
            ->get();

        return response()->json($report);
    }

}
