<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Transaction::create([
            'amount' => 1000,
            'payer' => '1',
            'due_on' => now()->subDays(5)->toDateString(), // Overdue
            'vat' => 10,
            'is_vat_inclusive' => true,
        ]);

        Transaction::create([
            'amount' => 1500,
            'payer' => '1',
            'due_on' => now()->addDays(2)->toDateString(), // Outstanding
            'vat' => 15,
            'is_vat_inclusive' => false,
        ]);

        Transaction::create([
            'amount' => 2000,
            'payer' => '',
            'due_on' => now()->subDays(2)->toDateString(), // Paid
            'vat' => 20,
            'is_vat_inclusive' => true,
        ]);

        // Add more sample transactions as needed
    }
}
