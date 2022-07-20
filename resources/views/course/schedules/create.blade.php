@extends('layouts.master')

@section('title', 'Add Schedule | CourseIn')

@section('content')
    <h3 class="mb-3 text-center">Add New Schedule</h3>
    <div class="container-fluid col-10 rounded border mt-3 p-4">
        <form action="{{ route('schedules.store') }}" method="POST">
            @csrf
            <div class="col-6 pe-3 mb-4">
                <label for="lesson" class="form-label">Lesson</label>
                <select class="form-select @error('lesson') is-invalid @enderror" id="lesson" name="lesson">
                    <option value="" {{ old('lesson') ? '' : 'selected' }}>Select lesson</option>
                    @foreach ($lessons as $lesson)
                        <option value="{{ $lesson->id }}" {{ $lesson->id == old('lesson') ? 'selected' : '' }}>
                            {{ $lesson->lesson_name }}</option>
                    @endforeach
                </select>
                @error('lesson')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-between mb-4">
                <div class="col-md-6 pe-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                        name="date" value="{{ old('date') }}">
                    @error('date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="start_time" class="form-label">Start time</label>
                    <input type="text" class="w-75 form-control @error('start_time') is-invalid @enderror"
                        id="start_time" name="start_time" value="{{ old('start_time') }}" placeholder="HH:MM">
                    @error('start_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="end_time" class="form-label">End time</label>
                    <input type="text" class="w-75 form-control @error('end_time') is-invalid @enderror" id="end_time"
                        name="end_time" value="{{ old('end_time') }}" placeholder="HH:MM">
                    @error('end_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6 mt-5 pe-3">
                <div class="d-flex gap-2 align-items-center">
                    <label for="repeated" class="form-label mb-0">Repeated every week for next</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control @error('repeated') is-invalid @enderror" id="repeated"
                            name="repeated" value="{{ old('repeated') }}">
                    </div>
                    <label for="repeated" class="form-label mb-0">session(s)</label>
                </div>
                @error('repeated')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="d-flex justify-content-center mt-5">
                <button type="submit" class="btn btn-primary col-4">Add schedule</button>
            </div>
        </form>
    </div>
@endsection
