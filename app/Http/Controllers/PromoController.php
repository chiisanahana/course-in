<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Payment;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        if (auth()->guard('course')->check()) {
            $lessons = Lesson::where('course_id', auth()->guard('course')->user()->id)->pluck('id')->toARray();
            return view('course.view_promos', [
                'promos' => Promo::whereIn('lesson_id', $lessons)
                    ->orWhere('apply_all', 1)->orderBy('end_date')->get()
            ]);
        } else if (auth()->guard('user')->check() && auth()->guard('user')->user()->role_id == 1) {
            return view('course.view_promos', [
                'promos' => Promo::orderBy('end_date')->get()
            ]);
        } else {
            abort(403);
        }
    }

    public function create()
    {
        if (auth()->guard('course')->check()) {
            return view('promos.create', [
                'lessons' => Lesson::where('course_id', auth()->guard('course')->user()->id)->get()
            ]);
        } else if (auth()->guard('user')->check() && auth()->guard('user')->user()->role_id == 1) {
            return view('promos.create');
        } else {
            abort(403);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lesson' => 'required',
            'code' => 'required',
            'discount' => 'required|numeric',
            'end_date' => 'required|date',
            'image' => 'required|file|image'
        ]);

        if (auth()->guard('user')->user()->role_id == 1) {
            $validatedData['apply_all'] = 1;
        }

        $validatedData['lesson_id'] = $request->lesson;
        $validatedData['discount'] = $request->discount / 100;
        $validatedData['image'] = $request->file('image')->store('promos', 'public');
        Promo::create($validatedData);
        toast('Successfully added a promo!', 'success');
        return redirect()->route('dashboard');
    }
}
