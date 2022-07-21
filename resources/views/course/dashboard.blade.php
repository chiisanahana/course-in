@extends('layouts.master')

@section('title', 'Dashboard | CourseIn')

@section('content')
    <h6 class="text-muted mb-3">Welcome back, {{ auth()->guard('course')->user()->name }}!</h6>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h1 class="card-title text-center my-4"><strong>{{$revenue}}</strong></h1>
                    <h3 class="card-title text-center">Total Revenue</h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h1 class="card-title text-center  my-4"><strong>{{$countTrainee}}</strong></h1>
                    <h3 class="card-title text-center">Total Trainee</h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h1 class="card-title text-center  my-4"><strong>{{$countCourse}}</strong></h1>
                    <h3 class="card-title text-center">Total Course</h3>
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
