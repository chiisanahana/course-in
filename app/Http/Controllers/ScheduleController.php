<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::where('course_id', auth()->guard('course')->user()->id)->get('id');
        return view('course.schedules.index', [
            'schedules' => Schedule::whereIn('lesson_id', $lessons)
                ->whereMonth('date', date('m'))
                ->where('date', '>', Carbon::yesterday())
                ->orderBy('date')
                ->get()->groupBy('date')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.schedules.create', [
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
        $validation = [
            'lesson' => 'required',
            'date' => 'required|after:yesterday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time'
        ];
        if ($request->repeated) {
            $validation['repeated'] = 'numeric|gte:0';
        }
        $validatedData = $request->validate($validation);

        // Kalau jadwal untuk tanggal dan waktu yang sama sudah ada, jangan disimpan 
        if (Schedule::isExists($request->lesson, $request->date, $request->start_time, $request->end_time)) {
            toast('Schedule for the specified time already exists!', 'error');
            return redirect()->route('schedules.index');
        } else {
            $validatedData['lesson_id'] = $request->lesson;
            $validatedData['start_lesson'] = $request->start_time;
            $validatedData['end_lesson'] = $request->end_time;

            Schedule::create($validatedData);
            // Kalau ada request repeated, create untuk setiap week sebanyak session yang diinput
            if ($request->repeated) {
                $date = Carbon::create($request->date);
                for ($i = 1; $i < $request->repeated + 1; $i++) {
                    $validatedData['date'] = $date->addDays(7);
                    // Hanya tambahkan jadwal yang belum ada
                    if (!Schedule::isExists($request->lesson, $validatedData['date'], $request->start_time, $request->end_time)) {
                        Schedule::create($validatedData);
                    }
                }
            }
            
            $lesson_name = Lesson::whereId($request->lesson)->first()->lesson_name;
            toast('Successfully added ' . $lesson_name . ' schedule!', 'success');
            return redirect()->route('schedules.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(String $date)
    {
        $lessons = Lesson::where('course_id', auth()->guard('course')->user()->id)->get('id');
        return view('course.schedules.show', [
            'date' => $date,
            'schedules' => Schedule::whereIn('lesson_id', $lessons)
                ->where('date', $date)
                ->orderBy('lesson_id')->orderBy('start_lesson')
                ->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        return view('course.schedules.edit', [
            'schedule' => $schedule
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        // dd(Schedule::where('date', "2022-07-13")->first());
        $validatedData = $request->validate([
            'date' => 'required|after:yesterday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time'
        ]);
        $validatedData['start_lesson'] = $request->start_time;
        $validatedData['end_lesson'] = $request->end_time;

        // kalau ada request repeated, update untuk setiap week dari jadwal lesson ini
        if ($request->repeated) {
            // cari hari yang sama
            $schedules = Schedule::where('lesson_id', $schedule->lesson->id)
                ->where(DB::raw("DAYOFWEEK(date)"), date('w', strtotime($schedule->unformatted_date)) + 1)
                ->where('start_lesson', $schedule->start_lesson)
                ->where('end_lesson', $schedule->end_lesson)
                ->orderBy('date')->get();
            $old_date = Carbon::create($schedule->date);
            $new_date = Carbon::create($request->date);
            foreach ($schedules as $s) {
                if ($s->unformatted_date == $old_date->toDateString()) {
                    // kalau consecutive week, update
                    $validatedData['date'] = $new_date;
                    Schedule::whereId($s->id)
                        ->update(array_diff_key($validatedData, array_flip(['start_time', 'end_time'])));
                    // set untuk next week-nya
                    $old_date->addDays(7);
                    $new_date->addDays(7);
                } else {
                    // kalau bukan consecutive week, kemungkinan itu bukan repeated session
                    break;
                }
            }
        } else {
            // kalau ga request repeated, maka edit untuk jadwal itu aja
            Schedule::whereId($schedule->id)
                ->update(array_diff_key($validatedData, array_flip(['start_time', 'end_time'])));
        }

        $lesson_name = Lesson::whereId($schedule->lesson->id)->first()->lesson_name;
        toast('Successfully edited ' . $lesson_name . ' schedule!', 'success');
        return redirect()->route('schedules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        Schedule::whereId($schedule->id)->delete();
        toast('Successfully deleted a schedule!', 'success');
        return redirect()->route('schedules.index');
    }
}
