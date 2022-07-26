<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            CategorySeeder::class,
            CourseSeeder::class,
            UserSeeder::class,
            LessonSeeder::class,
            ScheduleSeeder::class,
            PromoSeeder::class,
            WishlistSeeder::class,
            PaymentSeeder::class,
            TimetableSeeder::class
        ]);
    }
}
