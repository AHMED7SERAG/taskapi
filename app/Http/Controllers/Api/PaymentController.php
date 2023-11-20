<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
   
    public function store(Request $request)
    {
        $Rules = [
            'transaction_id' => 'required|exists:transactions,id',
            'amount' => 'required|numeric',
            'paid_on' => 'required|date',
            'details' => 'nullable|string',
        ];
        $validator = Validator::make($request->all(),$Rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $payment  = Payment::create($request->all());
        $this->updateTransactionStatus($payment->transaction);
        $data = [
            'payment' => $payment,
            'message' => "Success"
        ];
        return response()->json(['data' => $data], 201);

    }


    private function updateTransactionStatus(Transaction $transaction)
    {
        
        $currentDate = Carbon::now();

        if ($transaction->amount == $transaction->payments->sum('amount')) {
            $transaction->status = 'Paid';
        }else if ($transaction->due_on < $currentDate) {
            $transaction->status = 'Overdue';
        }  else {
            $transaction->status = 'Outstanding';
        }

        $transaction->save();
    }
}
