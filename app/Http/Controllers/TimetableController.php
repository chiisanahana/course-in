<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Payment;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index()
    {
        $schedules = Schedule::join('payments', 'payments.lesson_id', '=', 'schedules.lesson_id')
            ->join('timetables', 'timetables.lesson_id', '=', 'schedules.lesson_id')
            ->where('payments.user_id', auth()->guard('user')->user()->id);
        
        // Get lesson dalam periode pembayaran
        $lessonsPaid = Payment::where('user_id', auth()->guard('user')->user()->id)
            ->where('created_at', )
            ->pluck('lesson_id')->toArray();
        return view('trainee.schedules.index', [
            'timetable' => $schedules->whereMonth('date', date('m'))
                ->where('date', '>', Carbon::yesterday())
                ->orderBy('date')
                ->orderBy('start_lesson')
                ->get()->groupBy('date')
        ]);
    }
}
