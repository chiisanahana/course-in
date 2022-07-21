<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Payment;
use App\Models\Promo;
use App\Models\Schedule;
use App\Models\Timetable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->guard('course')->check()) {
            // ambil transaksi 30 hari terakhir dari payment
            $date = Carbon::now()->subMonth();
            $payment = Payment::where('created_at', '>=', $date)->get();
            // dd($payment);

            // ambil lesson dari payment 30 hari terakhir
            $lesson = Lesson::where('course_id', auth()->guard('course')->user()->id)->pluck('id')->toArray();
            $revenue = Payment::whereIn('lesson_id', $lesson)->where('created_at', '>=', $date)->sum('amount');
            return view('course.dashboard');
        } else {
            // else nya sudah pasti trainee dan bukan guest karena sudah ada auth sebelumnya
            $schedules = Schedule::join('payments', 'payments.lesson_id', '=', 'schedules.lesson_id')
                ->join('timetables', 'timetables.lesson_id', '=', 'schedules.lesson_id')
                ->where('payments.user_id', auth()->guard('user')->user()->id);
            return view('trainee.dashboard', [
                'timetables' => $schedules->whereMonth('date', date('m'))
                    ->where('date', '>', Carbon::yesterday())
                    ->orderBy('date')
                    ->orderBy('start_lesson')
                    ->take(3)->get(),
                'promos' => Promo::checkValidDate()->get()
            ]);
        }
    }

    public function profile($id)
    {
        if (auth()->guard('course')->check()) {
            $user = Course::where('id', $id)->first();
            // dd($user);
            return view('profile', [
                'user' => $user
            ]);
        } else {
            $user = User::where('id', $id)->first();
            return view('profile', [
                'user' => $user
            ]);
        }
    }
}
