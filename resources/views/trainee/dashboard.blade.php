@extends('layouts.master')

@section('title', 'Dashboard | CourseIn')

@section('content')
    <h4 class="mb-1">Welcome, {{ auth()->guard('user')->user()->name }}!</h4>
    <small class="text-muted">Let's learn something new today!</small>

    {{-- Top 3 upcoming course dari jadwal les user --}}
    <h5 class="fw-bold mt-4 mb-2">Upcoming Courses</h5>
    @if ($timetables->count())
        {{-- Kalau ada, tampilin semua --}}
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">
            @foreach ($timetables as $timetable)
                <div class="col">
                    <a href="{{ route('lessons.show', $timetable->lesson->id) }}" class="text-decoration-none">
                        <div class="card img-overlay h-100 text-white border-0">
                            <img src="/storage/{{ $timetable->lesson->image }}" class="card-img"
                                alt="{{ $timetable->lesson->lesson_name }}">
                            <div class="card-img-overlay d-flex flex-column justify-content-center overlay-dark">
                                <h4 class="card-title">{{ $timetable->lesson->lesson_name }}</h4>
                                <p class="card-text mb-0">{{ $timetable->date }}</p>
                                <p class="card-text">{{ $timetable->schedule_time }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        {{-- Kalau kosong, tampilkan pesan --}}
        <div class="d-flex flex-column gap-3 mt-5">
            <h5 class="text-center text-muted">You are free for the time being</h5>
            <h1 class="text-center text-muted">(～￣▽￣)～</h1>
        </div>
    @endif

    {{-- Promo yang sedang berlangsung --}}
    <h5 class="fw-bold mt-4 mb-3">🔥 Hot Promo 🔥</h5>
    @if ($promos->count())
        {{-- Kalau ada, tampilin semua --}}
        <div id="carousel" class="carousel slide col-10 px-5 mx-auto" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"></button>
                @foreach ($promos->skip(1) as $promo)
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="{{ $loop->iteration }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card text-white border-0">
                        <img src="/storage/{{ $promos[0]->image }}" class="card-img" alt="{{ $promos[0]->code }}">
                    </div>
                </div>
                @foreach ($promos->skip(1) as $promo)
                    <div class="carousel-item">
                        <div class="card text-white border-0">
                            <img src="/storage/{{ $promo->image }}" class="card-img" alt="{{ $promo->code }}">
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="bi bi-caret-left-square-fill h1 text-primary me-auto"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="bi bi-caret-right-square-fill h1 text-primary ms-auto"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @else
        {{-- Kalau kosong, tampilkan pesan --}}
        <div class="d-flex flex-column gap-3 mt-5">
            <h5 class="text-center text-muted">Coming soon</h5>
            <h1 class="text-center text-muted">o(*￣▽￣*)o</h1>
        </div>
    @endif

@endsection
