<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Timetable;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index()
    {
        $schedules = Schedule::join('lessons', 'lessons.id', '=', 'schedules.lesson_id')
            ->join('timetables', 'timetables.lesson_id', '=', 'lessons.id')
            ->availableSchedule(auth()->guard('user')->user()->id);
        // $schedules = Timetable::join('lessons', 'lessons.id', '=', 'timetables.lesson_id')
        //     ->join('schedules', 'schedules.lesson_id', '=', 'lessons.id')
        //     ->availableSchedule(auth()->guard('user')->user()->id);
        return view('trainee.schedules.index', [
            'timetable' => $schedules->whereMonth('date', date('m'))
                            ->where('date', '>', Carbon::yesterday())
                            ->orderBy('date')
                            ->get()->groupBy('date')
        ]);
    }
}
