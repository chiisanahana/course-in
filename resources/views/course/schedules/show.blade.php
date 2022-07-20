@extends('layouts.master')

@section('title')
    Schedules in {{ date('D, j M', strtotime($date)) }} | CourseIn
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Schedule(s) in {{ date('D, j M', strtotime($date)) }}</h3>
        <h5 class="text-muted">
            {{ $schedules->groupBy('lesson_id')->count() }} lesson(s),
            {{ $schedules->groupBy('id')->count() }} schedule(s)
        </h5>
    </div>
    @foreach ($schedules as $schedule)
        <div class="card mb-2">
            <div class="row g-0">
                <div class="col-md-3">
                    <img src="/storage/{{ $schedule->lesson->image }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mb-1">{{ $schedule->lesson->lesson_name }}</h5>
                        <p class="card-text text-primary">{{ $schedule->lesson->type }}</p>
                        <p class="card-text mb-0">{{ $schedule->schedule_time }}</p>
                        <p class="card-text"><small class="text-muted">With
                                {{ $schedule->lesson->lesson_teacher }}</small></p>
                    </div>
                    <div class="position-absolute top-50 end-0 translate-middle-y me-3">
                        <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-primary">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
