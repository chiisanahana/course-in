<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Timetable;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->guard('course')->check()) {
            return view('course.dashboard');
        } else {
            // else nya sudah pasti trainee dan bukan guest karena sudah ada auth sebelumnya
            return view('trainee.dashboard', [
                'timetables' => Timetable::where('user_id', '1')
                                    ->with('schedule.lesson')
                                    ->join('schedules', 'schedules.id', '=', 'timetables.schedule_id')
                                    ->orderBy('schedules.date')
                                    ->take(3)->get(),
                'promos' => Promo::checkValidDate()->get()
            ]);
        }        
    }
}
