<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            'lesson_id' => '1',
            'user_id' => '3',
            'promo_id' => '3',
            'payment_method' => 'QRIS',
            'amount' => 603000,
            'ratings' => 9
        ]);
        Payment::create([
            'lesson_id' => '4',
            'user_id' => '3',
            'promo_id' => '0',
            'payment_method' => 'QRIS',
            'amount' => 15003000,
            'ratings' => 7
        ]);
        Payment::create([
            'lesson_id' => '5',
            'user_id' => '2',
            'promo_id' => '0',
            'payment_method' => 'QRIS',
            'amount' => 153000,
            'ratings' => 7
        ]);
        Payment::create([
            'lesson_id' => '6',
            'user_id' => '2',
            'promo_id' => '0',
            'payment_method' => 'QRIS',
            'amount' => 303000,
            'ratings' => 10
        ]);
        Payment::create([
            'lesson_id' => '7',
            'user_id' => '4',
            'promo_id' => '3',
            'payment_method' => 'QRIS',
            'amount' => 340500,
            'ratings' => 8
        ]);
        Payment::create([
            'lesson_id' => '8',
            'user_id' => '4',
            'promo_id' => '2',
            'payment_method' => 'QRIS',
            'amount' => 433000,
            'ratings' => 9
        ]);
        Payment::create([
            'lesson_id' => '9',
            'user_id' => '5',
            'promo_id' => '0',
            'payment_method' => 'QRIS',
            'amount' => 503000,
            'ratings' => 8
        ]);
        Payment::create([
            'lesson_id' => '10',
            'user_id' => '5',
            'promo_id' => '0',
            'payment_method' => 'QRIS',
            'amount' => 703000,
            'ratings' => 9
        ]);
        Payment::create([
            'lesson_id' => '13',
            'user_id' => '5',
            'promo_id' => '0',
            'payment_method' => 'QRIS',
            'amount' => 753000,
            'ratings' => 6
        ]);
    }
}
