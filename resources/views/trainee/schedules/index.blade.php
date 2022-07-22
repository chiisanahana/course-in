@extends('layouts.master')

@section('title')
    {{ auth()->guard('user')->user()->name }}'s Schedule | CourseIn
@endsection

@section('content')
    {{-- * Notes: hanya display jadwal bulan ini --}}
    <h4 class="mb-3">{{ now()->format('F Y') }}</h4>
    @if ($timetable->count())
        <div class="accordion" id="schedule">
            @foreach ($timetable as $schedules)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $loop->iteration }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $loop->iteration }}">
                            <div class="d-flex align-items-center w-100">
                                <div class="fw-bold h5 mb-0 me-2">
                                    {{ date('d M', strtotime($schedules[0]->date)) }}
                                </div>
                                •
                                <div class="fw-bold h5 mb-0 ms-2">
                                    {{ date('l', strtotime($schedules[0]->date)) }}
                                </div>
                                <div class="ms-auto me-5">
                                    {{ $schedules->groupBy('lesson_id')->count() }} classes,
                                    {{ $schedules->count() }} sessions
                                </div>
                            </div>

                        </button>
                    </h2>
                    <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <ul class="list-group list-group-flush">
                                @foreach ($schedules as $schedule)
                                    <li class="list-group-item">
                                        <div class="d-flex gap-3">
                                            {{ $schedule->lesson->lesson_name }}
                                            <div class="vr"></div>
                                            {{ $schedule->schedule_time }}
                                            <span
                                                class="badge bg-primary rounded-pill ms-auto my-auto px-2">{{ $schedule->lesson->type }}</span>
                                        </div>
                                        <small class="text-muted">{{ $schedule->lesson->course->name }}</small>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="d-flex flex-column w-100 gap-3 mt-5">
            <h5 class="text-center text-muted">You are free for the time being</h5>
            <h1 class="text-center text-muted">(～￣▽￣)～</h1>
        </div>
    @endif
@endsection
