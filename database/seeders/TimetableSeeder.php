<?php

namespace Database\Seeders;

use App\Models\Timetable;
use Illuminate\Database\Seeder;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Timetable::create([
            'user_id' => '3',
            'lesson_id' => '1',
        ]);
        Timetable::create([
            'user_id' => '3',
            'lesson_id' => '4',
        ]);
        Timetable::create([
            'user_id' => '2',
            'lesson_id' => '5',
        ]);
        Timetable::create([
            'user_id' => '2',
            'lesson_id' => '6',
        ]);
        Timetable::create([
            'user_id' => '4',
            'lesson_id' => '7',
        ]);
        Timetable::create([
            'user_id' => '4',
            'lesson_id' => '8',
        ]);
        Timetable::create([
            'user_id' => '5',
            'lesson_id' => '9',
        ]);
        Timetable::create([
            'user_id' => '5',
            'lesson_id' => '10',
        ]);
        Timetable::create([
            'user_id' => '5',
            'lesson_id' => '13',
        ]);
    }
}
