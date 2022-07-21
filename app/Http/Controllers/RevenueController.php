<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Payment;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function view_revenue()
    {
        if (auth()->guard('course')->check()) {
            $courseId = auth()->guard('course')->user()->id;
            $allLesson = Lesson::where('course_id', $courseId)->get();
            $payment = Payment::all();
            $take = collect();
            foreach($payment as $p){
                $temp = $allLesson->where('id', $p->lesson_id)->first();
                if($temp){
                    $take->push($p);
                }
            }
            $total = 0;
            foreach($take as $t){
                $total += $t->amount;
            }
            $countCourse = Lesson::where('course_id', auth()->guard('course')->user()->id)->count();
            return view('course.revenue', [
                'total' => $total,
                'countCourse' => $countCourse,
                'countTrainee' => $take->count(),
                'payments' => $take
            ]);
        }
    }
}
