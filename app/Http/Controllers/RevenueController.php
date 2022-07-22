<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Payment;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    // Revenue buat course
    public function view_revenue()
    {
        if (auth()->guard('course')->check()) {
            // Mau ambil lesson milik si course ini
            $lessons = Lesson::where('course_id', auth()->guard('course')->user()->id)->pluck('id')->toArray();
            // Mau ambil payment dari lesson ini
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

    // Payment transaction buat admin
    public function viewTransaction()
    {
        return view('admin.view_transaction', [
            'payments' => Payment::all()
        ]);
    }

}
