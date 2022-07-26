@extends('layouts.master')

@section('title', 'Dashboard | CourseIn')

@section('content')
    <h6 class="text-muted mb-3">Welcome back, {{ auth()->guard('course')->user()->name }}!</h6>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100 text-white" style="background-color: #251e73;">
                <div class="card-body">
                    <i class="fa-solid fa-hand-holding-dollar fa-3x"></i>
                    <h1 class="card-title text-center my-4" style="font-size: 3rem"><strong>{{ $revenue }}</strong></h1>
                    <h4 class="card-title text-center">Total Revenue</h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 text-white" style="background-color: #f1c000;">
                <div class="card-body">
                    <i class="fa-solid bi-people-fill fa-3x"></i>
                    <h1 class="card-title text-center  my-4" style="font-size: 3rem"><strong>{{ $countTrainee }}</strong>
                    </h1>
                    <h4 class="card-title text-center">Total Trainee(s)</h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 text-white" style=" background-color: #3d796f;">
                <div class="card-body">
                    <i class="fa-solid bi-person-workspace fa-3x"></i>
                    <h1 class="card-title text-center  my-4" style="font-size: 3rem"><strong>{{ $countCourse }}</strong>
                    </h1>
                    <h4 class="card-title text-center">Total Course(s)</h4>
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
