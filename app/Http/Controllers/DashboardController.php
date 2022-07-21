<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Promo;
use App\Models\Timetable;
use App\Models\User;
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
                'timetables' => Timetable::where('user_id', auth()->guard('user')->user()->id)
                                    ->join('lessons', 'lessons.id', '=', 'timetables.lesson_id')
                                    ->take(3)->get(),
                'promos' => Promo::checkValidDate()->get()
            ]);
        }        
    }

    public function profile($id){
        if(auth()->guard('course')->check()){
            $user = Course::where('id', $id)->first();
            // dd($user);
            return view('profile', [
                'user' => $user
            ]);
        } else{
            $user = User::where('id', $id)->first();
            return view('profile', [
                'user' => $user
            ]);
        }
    }
}
