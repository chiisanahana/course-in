<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Payment;
use App\Models\Schedule;
use App\Models\Timetable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TimetableController extends Controller
{
    public function index()
    {
        $lessonsPaid = Payment::where('user_id', auth()->guard('user')->user()->id)
            ->whereBetween('created_at', [now()->subMonth()->toDateString(), now()->toDateString()])
            ->select('lesson_id', 'created_at')->get();
        $schedules = collect();
        foreach ($lessonsPaid as $lessonPaid) {
            $paymentDate = Carbon::create($lessonPaid->created_at->toDateString());
            $schedules = $schedules->merge(Schedule::where('lesson_id', $lessonPaid->lesson_id)
                ->whereBetween('date', [$paymentDate->toDateString(), $paymentDate->addDays(30)->toDateString()])
                ->pluck('id')->toArray());
        }
        $schedules = $schedules->toArray();

        return view('trainee.schedules.index', [
            'timetable' => Schedule::whereIn('id', $schedules)
                ->where('date', '>', Carbon::yesterday())
                ->orderBy('date')
                ->orderBy('start_lesson')
                ->get()->groupBy('date')
        ]);
    }
}
