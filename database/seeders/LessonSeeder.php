<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::create([
            'category_id' => '1',
            'course_id' => '1',
            'lesson_name' => 'Professional Baking and Pastry',
            'lesson_teacher' => 'Ms. Renata',
            'description' => 'We start introduction to the basic baking terminology, ingredients, flour characteristics, and the procedure of bread mixing. On the further level, this course precludes introduction to the basic pastry terminology, ingredients, cake mixing methods, and dessert presentation.',
            'price' => 800000,
            'rating' => 9,
            'image' => 'lessons/professional_baking_and_pastry.jpg',
            'type' => 'Course',
        ]);

        //http://maisonbleu.id/professionalbaking/

        Lesson::create([
            'category_id' => '1',
            'course_id' => '1',
            'lesson_name' => 'Propper Pudding Class',
            'lesson_teacher' => 'Ms. Calista',
            'description' => 'Do you want to master some delectable puds to finish off a delicious lunch or dinner with, or perhaps you just have a sweet tooth and love to bake? This Proper Pudding Class will teach you 3 delicious puddings that will hit the sweet spot every time!',
            'price' => 700000,
            'image' => 'lessons/proper_pudding_class.webp',
            'type' => 'Course',
        ]);

        // https://theavenuecookeryschool.com/shop/courses/dietary-specific-classes/proper-pudding-class/

        Lesson::create([
            'category_id' => '2',
            'course_id' => '2',
            'lesson_name' => 'Programming Lesson',
            'lesson_teacher' => 'Mr. Hendra',
            'description' => 'Intro to programming, unity fundamental, AR augmented reality development, flutter mobile apps development, front-end, back-end, data science fundamental, digital marketing fundamental, UI and UX',
            'price' => 1100000,
            'image' => 'lessons/programming_lesson.webp',
            'type' => 'Course',
        ]);

        //https://www.onetwocode.id/

        Lesson::create([
            'category_id' => '2',
            'course_id' => '2',
            'lesson_name' => 'Professional Laravel Course',
            'lesson_teacher' => 'Mr. Vincent',
            'description' => 'This course brings you to Beginner to Advance level by creating the complete most advanced creative project. You will be able to understand how to complete one project, how to handle project bugs, how to collaborate with teams, Core structures of MVC.',
            'price' => 1500000,
            'rating' => 7,
            'image' => 'lessons/professional_laravel_course.jpg',
            'type' => 'Course',
        ]);

        // https://appstick.com.bd/courses/laravel-course/26

        Lesson::create([
            'category_id' => '3',
            'course_id' => '3',
            'lesson_name' => 'Beyond Technical Analysis',
            'lesson_teacher' => 'Mr. Michael Yeoh',
            'description' => 'Trading requires technique and understanding of technical analysis. Technical analysis consists of how to read candles, trends, and volumes. By understanding indicators in technical analysis, it can help traders in searching for entry and selling points in order to maximize the capital gains from the trade. Participate in this 30 minutes workshop to learn more.',
            'price' => 150000,
            'rating' => 7,
            'image' => 'lessons/beyond_technical_analysis.jpg',
            'type' => 'Workshop',
        ]);

        //https://www.ternakuang.id/academy/128


        Lesson::create([
            'category_id' => '4',
            'course_id' => '4',
            'lesson_name' => 'Beginner Handbuilding Lesson',
            'lesson_teacher' => 'Ms. Josephine',
            'description' => 'This lesson focuses on basic handbuilding techniques like pinch and coil. In this lesson, you\'ll get the full experience from wedging to building. This workshop takes about two hours.',
            'price' => 300000,
            'rating' => 10,
            'image' => 'lessons/beginner_handbuilding_lesson.jpg',
            'type' => 'Workshop',
        ]);
        
        //https://www.tanakitaceramics.com/bookings-checkout/beginner-handbuilding-lesson/book/43f8b9a7-8e99-43bd-a23d-6a42b39752b7/1656212400000/1656219600000/7adb0b14-b744-47d9-a26d-0d40c54951fd/484ef120-a81b-4ef4-97ee-ef2979be5bed/2mmoW0vwKcSFyxtOfCdKNXZgIkrHcDBgPALvULaQ4ZgrkJnM4EXfRL5CgFoLCjH6LD53kWaa5qClJluaDTn3jjrb5HMhIHZQDPzx?referral=daily_time_table_widget
        
        Lesson::create([
            'category_id' => '5',
            'course_id' => '5',
            'lesson_name' => 'HSK Level 3 Mandarin',
            'lesson_teacher' => 'Ms. Calista',
            'description' => 'Future careers and many business opportunities lies ahead of you. Prepare yourself by learning Mandarin to communicate better with people. Learning will be adjusted according to the needs and requirements. Schedule and location will be flexible.',
            'price' => 450000,
            'rating' => 8,
            'image' => 'lessons/hsk_level_3_mandarin.jpg',
            'type' => 'Course',
        ]);
        
        
        Lesson::create([
            'category_id' => '6',
            'course_id' => '6',
            'lesson_name' => 'Foundation Yoga',
            'lesson_teacher' => 'Ms. Rini',
            'description' => 'Guided by professionals, yoga lesson could be very fun. Try our yoga lesson and enjoy our amenities available in our facility. We follow COVID-19 protocols and ensure the cleanliness of our yoga room for your maximum comfort.',
            'rating' => 9,
            'price' => 550000,
            'image' => 'lessons/foundation_yoga.jpg',
            'type' => 'Course',
        ]);
        
        //https://lessonpass.com/studios/orum-jakarta?search-id=71836129097457442
        
        Lesson::create([
            'category_id' => '7',
            'course_id' => '7',
            'lesson_name' => 'Muay Thai',
            'lesson_teacher' => 'Mr. Jonathan Kevin',
            'description' => 'Zealot Muay thai Camp first established in Jakarta in 2011. Our founder & Head coach Jeremias Abraham brings his expertise from Thailand where he received both a professional fighting experience and a prestigious certificate as Instructor at WMC Lamai Gym Koh Samui and Sinbi Muay thai Phuket.',
            'rating' => 8,
            'price' => 500000,
            'image' => 'lessons/muay_thai.jpg',
            'type' => 'Course',
        ]);
        
        //https://zealotmuaythai.com/daanmogot.html
        
        Lesson::create([
            'category_id' => '8',
            'course_id' => '8',
            'lesson_name' => 'Basic Guitar Lessons',
            'lesson_teacher' => 'Mr. Ivan',
            'description' => 'We offer a flexible learning system with comprehensive curriculum. We also teaches many collections of songs from jazz, lessonic, pop, movie soundtrack and many more! We received good reviews and have been teaching for more than 17 years. No need to worry since our we provide everything you need in our facility.',
            'rating' => 9,
            'price' => 700000,
            'image' => 'lessons/basic_guitar_lessons.jpeg',
            'type' => 'Course',
        ]);

        //https://ivanguitarstudio.com/school/

        Lesson::create([
            'category_id' => '8',
            'course_id' => '8',
            'lesson_name' => 'How to Play Guitar in 2 hours?',
            'lesson_teacher' => 'Mr. Jeason',
            'description' => 'Do you want to learn how to play guitar from the basics? Have you ever seen all the information about chords, guitar types and felt overwhelmed? With this course, eliminate all your guitar problems and learn to play like the perfect guitarist.',
            'price' => 50000,
            'image' => 'lessons/how_to_play_guitar_in_2_hours.jpg',
            'type' => 'Workshop',
        ]);

        Lesson::create([
            'category_id' => '9',
            'course_id' => '9',
            'lesson_name' => 'Dragon Badminton Lesson',
            'lesson_teacher' => 'Mr. Hairul',
            'description' => 'Badminton training from basic exercises, improving stroke and hit, correcting steps, and physical exercises. Fees already include shuttlecocks and court facility.',
            'price' => 800000,
            'image' => 'lessons/dragon_badminton_lesson.jpg',
            'type' => 'Course',
        ]);

        Lesson::create([
            'category_id' => '9',
            'course_id' => '9',
            'lesson_name' => 'Badminton Trick Shots',
            'lesson_teacher' => 'Mr. Niko',
            'description' => 'Learn badminton trick shots from basic to advance',
            'rating' => 6,
            'price' => 750000,
            'image' => 'lessons/badminton_trick_shots.jpg',
            'type' => 'Course',
        ]);
    }
}
