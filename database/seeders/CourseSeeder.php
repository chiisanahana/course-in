<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'Maison Bleu Culinary School',
            'email' => 'maisonbleuid@gmail.com',
            'password' => '$2a$12$rMOfibER2q/hKit9FtVKDO6qhtU77cGSvClm9HqQP3owBP4jwcCyu',
            'wa_number' => '081517677615',
            'address' => 'Jl. Raya Boulevard Timur Blok NE-01/73, Kelapa Gading, 14240.'
        ]);

        Course::create([
            'name' => 'ONETWOCODE Indonesia',
            'email' => 'halo@onetwocode.id',
            'password' => '$2a$12$rMOfibER2q/hKit9FtVKDO6qhtU77cGSvClm9HqQP3owBP4jwcCyu',
            'wa_number' => '082182838889',
            'address' => 'Ruko Daan Mogot Baru Blok LB2 No. 24, Lantai 2 Lino Cafe, Jl. Utan Jati, RT.8/RW.12, Kalideres, Jakarta Barat, Daerah Khusus Ibukota Jakarta 11840.'
        ]);

        Course::create([
            'name' => 'TERNAKUANG',
            'email' => 'cs@ternakuang.id',
            'password' => '$2a$12$rMOfibER2q/hKit9FtVKDO6qhtU77cGSvClm9HqQP3owBP4jwcCyu',
            'wa_number' => '088987777779',
            'address' => 'Podomoro City, Jl. let. S. Parman Kav. 28, Soho Capital. Jakarta Barat, 11470.'
        ]);

        Course::create([
            'name' => 'Tanakita Ceramics',
            'email' => 'tanakitaceramics@gmail.com',
            'password' => '$2a$12$rMOfibER2q/hKit9FtVKDO6qhtU77cGSvClm9HqQP3owBP4jwcCyu',
            'wa_number' => '081387812228',
            'address' => 'Jl. Tanjung Duren Barat IV No.43a, RT.1/RW.5, Tj. Duren Utara, Kec. Grogol Petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11470.'
        ]);

        Course::create([
            'name' => 'Caterpillar Learning Center',
            'email' => 'caterpillarlc@gmail.com',
            'password' => '$2a$12$rMOfibER2q/hKit9FtVKDO6qhtU77cGSvClm9HqQP3owBP4jwcCyu',
            'wa_number' => '082155951157',
            'address' => 'Jl. Taman Palem Lestari No.32, RT.3/RW.13, Cengkareng Bar., Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11730'
        ]);

        Course::create([
            'name' => 'ORUM',
            'email' => 'orumjakarta@gmail.com',
            'password' => '$2a$12$rMOfibER2q/hKit9FtVKDO6qhtU77cGSvClm9HqQP3owBP4jwcCyu',
            'wa_number' => '0862213918983',
            'address' => 'Jl. KH. Wahid Hasyim No. 55, Jakarta, 10350.'
        ]);

        Course::create([
            'name' => 'Zealot Muay Thai',
            'email' => 'zealotmuaythai@gmail.com',
            'password' => '$2a$12$rMOfibER2q/hKit9FtVKDO6qhtU77cGSvClm9HqQP3owBP4jwcCyu',
            'wa_number' => '089512635035',
            'address' => 'Jl. BEDUGUL Blk. 3A No.8, RW.12, Kalideres, Kec. Kalideres, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11840.'
        ]);

        Course::create([
            'name' => 'Ivan Guitar Studio',
            'email' => 'ivanguitarstudio@gmail.com',
            'password' => '$2a$12$rMOfibER2q/hKit9FtVKDO6qhtU77cGSvClm9HqQP3owBP4jwcCyu',
            'wa_number' => '08161978984',
            'address' => 'Villa, Jl. Taman Cemara No.30, RT.5/RW.10, South Meruya, Kembangan, West Jakarta City, Jakarta 11610'
        ]);

        Course::create([
            'name' => 'Dragon Badminton Hall',
            'email' => 'dragonbadmintonhall@gmail.com',
            'password' => '$2a$12$rMOfibER2q/hKit9FtVKDO6qhtU77cGSvClm9HqQP3owBP4jwcCyu',
            'wa_number' => '082154337216',
            'address' => 'Jl. Bambu Larangan No.82, RT.1/RW.15, Pegadungan, Kec. Kalideres, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11830'
        ]);
    }
}
