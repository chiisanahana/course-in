@extends('layouts.master')

@section('title', 'Dashboard | CourseIn')

@section('content')
    <h6 class="text-muted mb-3">Welcome back, {{ auth()->guard('course')->user()->name }}!</h6>

    <div class="card bg-info border-0 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Wanna promote your course?</h4>
            <p class="card-text mb-4">Increase popularity and engage new members by promoting now!</p>
            <a href="{{ route('promos.create') }}" class="text-primary">Click here for more</a>
        </div>
    </div>

@endsection
