<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Payment;

class LandingPageController extends Controller
{
    public function course_in_demand()
    {
        return view('landing_page', [
            'lessons' => Lesson::withCount('payments')
                ->orderByDesc('payments_count')
                ->take(4)->get()
        ]);
    }
}
