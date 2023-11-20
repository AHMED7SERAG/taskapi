<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'payer', 'due_on', 'vat', 'is_vat_inclusive','status'];

    public function getStatusAttribute()
    {
        $currentDate = Carbon::now();
        $dueDate = Carbon::parse($this->attributes['due_on']);

        if ($this->attributes['amount'] == $this->paidAmount()) {
            return 'Paid';
        } elseif ($currentDate > $dueDate) {
            return 'Overdue';
        } else {
            return 'Outstanding';
        }
    }

    public function paidAmount()
    {
        // Implement the logic to calculate the total paid amount for the transaction
        // For simplicity, assuming there is a 'paid_amount' field in the transactions table
        return $this->payments()->sum('amount');
    }

    public function payments()
    {
        // Assuming there is a payments relationship
        return $this->hasMany(Payment::class);
    }
    public function payerUser()
    {
        return $this->belongsTo(User::class,'payer');
    }
}
