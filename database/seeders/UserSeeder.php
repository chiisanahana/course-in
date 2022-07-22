<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'wa_number' => '0812-1234-4321',
            'address' => 'Jakarta',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);
    }
}
