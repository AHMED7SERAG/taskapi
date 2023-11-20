<?php
// app/Http/Controllers/PaymentController.php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        return view('payment.create', compact('transaction'));
    }

    public function store(Request $request, $transactionId)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'paid_on' => 'required|date',
            'details' => 'nullable|string',
        ]);

        $payment = new Payment($request->all());
        $payment->transaction_id = $transactionId;
        $payment->save();
        $transaction = Transaction::find($transactionId);
        $this->updateTransactionStatus($transaction);
    
        return redirect()->route('transaction.index')->with('success', 'Payment recorded successfully!');
    }

    public function edit($transactionId, $paymentId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        $payment = Payment::findOrFail($paymentId);
        
        return view('payment.edit', compact('transaction', 'payment'));
    }

    public function update(Request $request, $transactionId, $paymentId)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'paid_on' => 'required|date',
            'details' => 'nullable|string',
        ]);


        $payment = Payment::findOrFail($paymentId);
        $payment->update($request->all());

        return redirect()->route('transaction.index')->with('success', 'Payment updated successfully!');
    }

    public function show($transactionId, $paymentId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        $payment = Payment::findOrFail($paymentId);

        return view('payment.show', compact('transaction', 'payment'));
    }


    public function destroy($transactionId, $paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        $payment->delete();

        return redirect()->route('transaction.index')->with('success', 'Payment deleted successfully!');
    }
    private function updateTransactionStatus(Transaction $transaction)
{
    
    $currentDate = Carbon::now();

    if ($transaction->amount === $transaction->payments->sum('amount')) {
        $transaction->status = 'Paid';
    }else if ($transaction->due_on < $currentDate) {
        $transaction->status = 'Overdue';
    }  else {
        $transaction->status = 'Outstanding';
    }

    $transaction->save();
}
}
