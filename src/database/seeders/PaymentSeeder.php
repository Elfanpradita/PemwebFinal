<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::create([
            'event_course_id' => 1, // Pastikan event_course dengan ID 1 sudah ada
            'user_id' => 1,         // Pastikan user dengan ID 1 sudah ada
            'nomor_pembayaran' => 'INV-20250701-001',
            'amount' => '1500000',
            'metode_pembayaran' => 'Transfer Bank',
            'refrence' => 'BANK1234567890',
            'status' => 'paid',
        ]);
    }
}
