<?php

namespace App\Http\Controllers;

use App\Models\Lesson;

class LandingPageController extends Controller
{
    public function course_in_demand()
    {
        return view('landing_page', [
            'lessons' => Lesson::all()->take(4)
        ]);
    }

    public function list_course_in_demand()
    {
        return view('courses_in_demand', [
            'lessons' => Lesson::paginate(8)
        ]);
    }
}
