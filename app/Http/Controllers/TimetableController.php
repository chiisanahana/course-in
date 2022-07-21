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
        $schedules = Schedule::join('timetables', 'timetables.schedule_id', '=', 'schedules.id')
            ->where('user_id', auth()->guard('user')->user()->id);
        return view('trainee.schedules.index', [
            'timetable' => $schedules->whereMonth('date', date('m'))
                            ->where('date', '>', Carbon::yesterday())
                            ->orderBy('date')
                            ->get()->groupBy('date')
        ]);
    }
}
