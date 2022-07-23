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

        User::create([
            'name' => 'Calista Daphne',
            'email' => 'calista@gmail.com',
            'wa_number' => '0812-7630-3591',
            'address' => 'Medan',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Ivanco Gratio Hartono',
            'email' => 'ivanco@gmail.com',
            'wa_number' => '0823-7199-4324',
            'address' => 'Palembang',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Mulyani',
            'email' => 'mulyani@gmail.com',
            'wa_number' => '0822-4690-9839',
            'address' => 'Bogor',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Vincent',
            'email' => 'vincent@gmail.com',
            'wa_number' => '0895-6059-85036',
            'address' => 'Jakarta',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);
    }
}
