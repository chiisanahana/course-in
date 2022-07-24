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
            'wa_number' => '081212344321',
            'address' => 'Jakarta',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Calista Daphne',
            'email' => 'calista@gmail.com',
            'wa_number' => '081276303591',
            'address' => 'Medan',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Ivanco Gratio Hartono',
            'email' => 'ivanco@gmail.com',
            'wa_number' => '082371994324',
            'address' => 'Palembang',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Mulyani',
            'email' => 'mulyani@gmail.com',
            'wa_number' => '082246909839',
            'address' => 'Bogor',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Vincent',
            'email' => 'vincent@gmail.com',
            'wa_number' => '0895605985036',
            'address' => 'Jakarta',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);
    }
}
