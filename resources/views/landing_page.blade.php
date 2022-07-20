@extends('layouts.master')

@section('title', 'Welcome to CourseIn')
@section('content')
    <div class="container pb-2 mb-3">
        <div class="mt-3 mb-5 d-flex flex-row justify-content-around gap-4">
            <p class="text-left fs-3 my-auto">
                The solution to finding all courses you'll ever need. <br>
                Education, Hobbies, Lifestyle, Health, Entertainment, and more...<br>
                You name it, we got it
            </p>
            <img src="https://bit.ly/3Acssre" class="rounded float-end" alt="img">
        </div>

        <h3 class="fw-bold mb-3">Courses in Demand</h3>
        <div class="row row-cols-1 row-cols-md-4 g-4 mb-3">
            @foreach ($lessons as $lesson)
                <div class="col">
                    <div class="card h-100 lesson-card">
                        <img src="/storage/{{ $lesson->image }}"
                            class="card-img-top" alt="{{ $lesson->lesson_name }}">
                        <div class="card-body">
                            <h5 class="card-title mb-0">{{ $lesson->lesson_name }}</h5>
                            <small class="card-text text-muted">{{ $lesson->course->course_name }}</small>
                            <p class="card-text my-2F">{!! $lesson->price !!}</p>
                            <small class="card-text">{{ $lesson->course->address }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="text-end"><a href="/courses-in-demand" class="text-decoration-none">View More</a></p>
    </div>
@endsection
