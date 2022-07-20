<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lesson;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lessons.index', [
            'lessons' => Lesson::where('course_id', auth()->guard('course')->user()->id)->get()
        ]);
    }

    public function search()
    {
        return view('lessons.search', [
            'lessons' => Lesson::search(request('key'))->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lessons.create', [
            'categories' => Category::all()
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
            'category' => 'required',
            'type' => 'required',
            'lesson_name' => 'required',
            'lesson_teacher' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'lesson_image' => 'required|file|image'
        ]);
        $validatedData['category_id'] = $request->category;
        $validatedData['course_id'] = auth()->guard('course')->user()->id;
        $validatedData['lesson_teacher'] = $request->prefix . ' ' . $request->lesson_teacher;
        $validatedData['image'] = $request->file('lesson_image')->store('lessons', 'public');

        Lesson::create($validatedData);
        toast('Successfully added a lesson!', 'success');
        return redirect()->route('lessons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        return view('lessons.detail', [
            'lesson' => Lesson::whereId($lesson->id)->first(),
            'schedules' => Schedule::where('lesson_id', $lesson->id)
                ->where('date', '>', Carbon::yesterday())
                ->orderBy('date')
                ->orderBy('start_lesson')
                ->simplePaginate(5)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('lessons.edit', [
            'lesson' => $lesson,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            'type' => 'required',
            'lesson_name' => 'required',
            'lesson_teacher' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'lesson_image' => 'file|image'
        ]);
        $validatedData['category_id'] = $request->category;
        $validatedData['course_id'] = auth()->guard('course')->user()->id;
        $validatedData['lesson_teacher'] = $request->prefix . ' ' . $request->lesson_teacher;
        // image storing
        if ($request->lesson_image) {
            Storage::delete($lesson->image);
            $validatedData['image'] = $request->file('lesson_image')->store('lessons', 'public');
        } else {
            $validatedData['image'] = $lesson->image;
        }

        Lesson::whereId($lesson->id)
            ->update(array_diff_key($validatedData, array_flip(['category', 'lesson_image'])));
        toast('Successfully edited a lesson!', 'success');
        return redirect()->route('lessons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        Storage::disk('public')->delete($lesson->image);
        Lesson::whereId($lesson->id)->delete();
        toast('Successfully deleted a lesson!', 'success');
        return redirect()->route('lessons.index');
    }
}
