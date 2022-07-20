<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Culinary',
            'image' => 'https://info.ehl.edu/hubfs/Imported_Blog_Media/modern-plating-culinary-arts.jpg'
        ]);

        Category::create([
            'name' => 'Education',
            'image' => 'https://habitatbroward.org/wp-content/uploads/2020/01/10-Benefits-Showing-Why-Education-Is-Important-to-Our-Society.jpg'
        ]);

        Category::create([
            'name' => 'Entrepreneurship',
            'image' => 'https://www.chiangraitimes.com/wp-content/uploads/2022/02/pexels-photo-1509428.webp'
        ]);

        Category::create([
            'name' => 'Hobbies',
            'image' => 'https://images.unsplash.com/photo-1522410818928-5522dacd5066?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8aG9iYnl8ZW58MHx8MHx8&auto=format&fit=crop&w=600&q=60'
        ]);

        Category::create([
            'name' => 'Languages',
            'image' => 'https://sarabelligoni.files.wordpress.com/2017/03/languages.jpg'
        ]);

        Category::create([
            'name' => 'Lifestyle',
            'image' => 'https://miro.medium.com/max/1400/1*PhozsTzydYA2KkubOmNCDg.jpeg'
        ]);

        Category::create([
            'name' => 'Martial Arts',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/42/Martial_arts_in_the_sunset_Stefano_Kocka.jpg'
        ]);

        Category::create([
            'name' => 'Music',
            'image' => 'https://www.ed2go.com/common/images/1/17216.jpg'
        ]);

        Category::create([
            'name' => 'Sports',
            'image' => 'https://img.freepik.com/free-photo/sports-tools_53876-138077.jpg?w=2000'
        ]);
    }
}
