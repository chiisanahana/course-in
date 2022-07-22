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
            foreach ($payment as $p) {
                $temp = $allLesson->where('id', $p->lesson_id)->first();
                if ($temp) {
                    $take->push($p);
                }
            }

            // Mau ambil lesson milik si course ini
            $lessons = Lesson::where('course_id', auth()->guard('course')->user()->id)->pluck('id')->toArray();
            dd($lessons);
            // Mau ambil payment dari lesson ini, ambil total revenue dia
            // $revenue = Payment::whereIn('lesson_id', $lessons)->sum('amount');
            $payments = Payment::whereIn('lesson_id', $lessons);
            // Mau ambil berapa jumlah yang pake card
            $cardCount = Payment::whereIn('lesson_id', $lessons)->where('payment_method', 'Card')->count();
            // Mau ambil berapa jumlah yang pake QRIS
            $qrisCount = Payment::whereIn('lesson_id', $lessons)->where('payment_method', 'QRIS')->count();
            

            return view('course.revenue', [
                'payments' => $payments->get(),
                'total' => $payments->sum('amount'),
                'cardCount' => $cardCount,
                'qrisCount' => $qrisCount,
            ]);
        }
    }
}
