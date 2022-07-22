<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        return view('course.view_promos');
    }

    public function create()
    {
        return view('promos.create', [
            'lessons' => Lesson::where('course_id', auth()->guard('course')->user()->id)->get()
        ]);
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

        $validatedData['lesson_id'] = $request->lesson;
        $validatedData['discount'] = $request->discount/100;
        $validatedData['image'] = $request->file('image')->store('promos', 'public'); 
        Promo::create($validatedData);
        toast('Successfully added a promo!', 'success');
        return redirect()->route('dashboard');
    }
}
