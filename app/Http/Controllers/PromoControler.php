<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promos.create', [
            'lessons' => Lesson::where('course_id', auth()->guard('course')->user()->id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lesson' => 'required',
            'code' => 'required',
            'discount' => 'required|numeric',
            'end_date' => 'required',
            'image' => 'required|file|image'
        ]);

        $validatedData['lesson_id'] = $request->lesson;
        $validatedData['discount'] = $request->discount/100;
        $validatedData['image'] = $request->file('image')->store('promos', 'public'); 
        Promo::create($validatedData);
        toast('Successfully added a promo!', 'success');
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        //
    }
}