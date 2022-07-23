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
        // Payment::create([
        //     'lesson_id' => '1',
        //     'user_id' => '2',
        //     'promo_id' => '0812-1234-4321',
        //     'address' => 'Jakarta',
        //     'password' => bcrypt('password'),
        //     'role_id' => 1,
        // ]);

        // $table->id(); 
        //     $table->foreignId('lesson_id')->constrained();
        //     $table->foreignId('user_id')->constrained();
        //     $table->integer('promo_id')->default(0);
        //     $table->string('payment_method');
        //     $table->integer('amount');
        //     $table->integer('ratings')->default(0);
        //     $table->timestamps();
    }
}
