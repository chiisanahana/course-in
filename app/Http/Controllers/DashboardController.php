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
            $courseId = auth()->guard('course')->user()->id;
            $allLesson = Lesson::where('course_id', $courseId)->get(); //lesson yang belong to courseID (course yang lagi login)
            // ambil transaksi 30 hari terakhir dari payment
            $date = Carbon::now()->subMonth();
            $payment = Payment::where('created_at', '>=', $date)->get(); //payment dri bulan lalu
            $take = collect();
            // dd($allLesson);
            foreach($payment as $p){
                $temp = $allLesson->where('id', $p->lesson_id)->first();
                if($temp){
                    $take->push($temp);
                }
            }
            // dd($take->count());
            
            // dd($temp);
            // ambil lesson dari payment 30 hari terakhir
            $lesson = Lesson::where('course_id', auth()->guard('course')->user()->id)->pluck('id')->toArray();
            
            $countCourse = Lesson::where('course_id', auth()->guard('course')->user()->id)->count();
            $revenue = Payment::whereIn('lesson_id', $lesson)->where('created_at', '>=', $date)->sum('amount');
            $revenue = 'IDR '.number_format($revenue);
            return view('course.dashboard', [
                'revenue' => $revenue,
                'countCourse' => $countCourse,
                'countTrainee' => $take->count()
            ]);
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
