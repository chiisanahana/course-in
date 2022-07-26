@extends('layouts.master')

@section('title')
    {{ auth()->guard('user')->user()->name }}'s Courses | CourseIn
@endsection

@section('content')
    <h3 class="mb-3">Your Courses</h3>

    @if ($lessons->count())
        {{-- Kalau ada, tampilin semua --}}
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($lessons as $lesson)
                <div class="col">
                    @if ($lesson->course->active)
                        <a href="{{ route('lessons.show', $lesson->id) }}" class="text-decoration-none text-dark">
                    @endif
                    <div class="card h-100 lesson-card pb-3 {{ $lesson->course->active ? '' : 'opacity-50' }}">
                        <img src="/storage/{{ $lesson->image }}" class="card-img-top" alt="{{ $lesson->lesson_name }}">
                        <div class="card-body pb-1">
                            <h5 class="card-title mb-0">{{ $lesson->lesson_name }}</h5>
                            <small class="card-text text-muted">{{ $lesson->course->course_name }}</small>
                            <p class="card-text my-2 text-primary">{{ $lesson->price }}</p>
                            <small class="card-text">With {{ $lesson->lesson_teacher }}</small>
                            <p class="card-text text-warning fw-bold">
                                <i class="bi bi-star-fill"></i> {{ $lesson->rating }}
                            </p>
                        </div>
                    </div>
                    @if ($lesson->course->active)
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        {{-- Kalau kosong, tampilkan pesan --}}
        <div class="d-flex flex-column gap-5 mt-5 p-5">
            <h5 class="text-center text-muted">You have no course yet.</h5>
            <h1 class="text-center text-muted">(っ °Д °;)っ</h1>
            <a href="{{ route('categories.index') }}" class="h4 text-decoration-none text-center text-primary">
                <i class="bi bi-search text-primary"> </i>Browse courses
            </a>
        </div>
    @endif
@endsection
