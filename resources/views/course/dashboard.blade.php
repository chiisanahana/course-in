@extends('layouts.master')

@section('title', 'Dashboard | CourseIn')

@section('content')
    <h6 class="text-muted mb-3">Welcome back, {{ auth()->guard('course')->user()->name }}!</h6>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title text-center"><strong>Total Revenue</strong></h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                        content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title text-center"><strong>Total Trainee</strong></h5>
                    <p class="card-text">This is a short card.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title text-center"><strong>Total Course</strong></h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                        content.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-info border-0 shadow-sm mt-4">
        <div class="card-body">
            <h4 class="card-title">Wanna promote your course?</h4>
            <p class="card-text mb-4">Increase popularity and engage new members by promoting now!</p>
            <a href="{{ route('promos.create') }}" class="text-primary">Click here for more</a>
        </div>
    </div>

@endsection
