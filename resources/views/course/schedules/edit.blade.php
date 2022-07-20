@extends('layouts.master')

@section('title', 'Edit Schedule | CourseIn')

@section('content')
    <h3 class="mb-3 text-center">Edit Schedule</h3>
    <div class="container-fluid col-10 rounded border mt-3 p-4">
        <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-6 pe-3 mb-4">
                <label for="lesson" class="form-label">Lesson</label>
                <select class="form-select" id="lesson" name="lesson" disabled>
                    <option selected>{{ $schedule->lesson->lesson_name }}</option>
                </select>
                <input type="hidden" name="lesson_id" value="{{ $schedule->lesson->id }}">
            </div>
            <div class="d-flex justify-content-between mb-4">
                <div class="col-md-6 pe-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                        name="date" value="{{ $schedule->unformatted_date }}">
                    @error('date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="start_time" class="form-label">Start time</label>
                    <input type="text" class="w-75 form-control @error('start_time') is-invalid @enderror"
                        id="start_time" name="start_time" value="{{ $schedule->start_lesson }}" placeholder="HH:MM">
                    @error('start_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="end_time" class="form-label">End time</label>
                    <input type="text" class="w-75 form-control @error('end_time') is-invalid @enderror" id="end_time"
                        name="end_time" value="{{ $schedule->end_lesson }}" placeholder="HH:MM">
                    @error('end_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input my-1" type="checkbox" role="switch" id="repeated" name="repeated">
                <label class="form-check-label" for="repeated">Also edit for all repeated week</label>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <button type="submit" class="btn btn-primary col-4">Edit schedule</button>
            </div>
        </form>
    </div>
@endsection
