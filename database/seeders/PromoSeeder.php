<?php

namespace Database\Seeders;

use App\Models\Promo;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promo::create([
            'lesson_id' => '5',
            'code' => 'CLCIN20',
            'discount' => 0.2,
            'end_date' => '2022-08-31',
            'image' => 'promos/Basic Mandarin Class Banner.png',
            'apply_all' => false
        ]);

        Promo::create([
            'lesson_id' => '8',
            'code' => 'ORUMYOGA',
            'discount' => 0.2,
            'end_date' => '2022-08-14',
            'image' => 'promos/Minimalist Yoga Banner.png',
            'apply_all' => false,
            'usedTimes' => 1
        ]);

        Promo::create([
            'lesson_id' => '1',
            'code' => 'INSUMMER',
            'discount' => 0.25,
            'end_date' => '2022-08-31',
            'image' => 'promos/Yellow Abstract Summer Sale Banner.png',
            'apply_all' => true,
            'usedTimes' => 2
        ]);
    }
}
