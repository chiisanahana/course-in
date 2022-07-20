@extends('layouts.master')

@section('title')
    {{ auth()->guard('course')->user()->name }} Lessons | CourseIn
@endsection

@section('content')
    <h3 class="mb-3">Your Lessons</h3>

    @if ($lessons->count())
        {{-- Kalau ada, tampilin semua --}}
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($lessons as $lesson)
                <div class="col">
                    <a href="{{ route('lessons.show', $lesson->id) }}" class="text-decoration-none text-dark">
                        <div class="card h-100 lesson-card">
                            <img src="/storage/{{ $lesson->image }}" class="card-img-top"
                                alt="{{ $lesson->lesson_name }}">
                            <div class="card-body pb-1">
                                <h5 class="card-title mb-0">{{ $lesson->lesson_name }}</h5>
                                <small class="card-text text-muted">{{ $lesson->course->course_name }}</small>
                                <p class="card-text my-2 text-primary">{{ $lesson->price }}</p>
                                <small class="card-text">With {{ $lesson->lesson_teacher }}</small>
                                <p class="card-text text-warning fw-bold">
                                    <i class="bi bi-star-fill"></i> {{ $lesson->rating }}
                                </p>
                                <div class="d-flex mt-3 mb-2">
                                    {{-- Button untuk edit lesson --}}
                                    <a href="{{ route('lessons.edit', $lesson->id) }}" type="button" class="btn btn-info me-2">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    {{-- Button untuk delete lesson --}}
                                    <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        {{-- Kalau kosong, tampilkan pesan --}}
        <div class="d-flex flex-column gap-5 mt-5 p-5">
            <h5 class="text-center text-muted">You have no lesson yet.</h5>
            <h1 class="text-center text-muted">(っ °Д °;)っ</h1>
        </div>
    @endif
    <div class="fixed-bottom d-flex justify-content-end">
        <a href="{{ route('lessons.create') }}" type="button" class="btn btn-primary rounded-circle shadow px-2 py-1 m-4">
            <i class="bi bi-plus h1"></i>
        </a>
    </div>
@endsection
