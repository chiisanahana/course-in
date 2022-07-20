@extends('layouts.master')

@section('title', 'Login | CourseIn')
@section('content')
    <div class="container col-4 position-absolute top-50 start-50 translate-middle">
        <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log In</h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Email</label>
                <input type="email" id="form2Example1" class="form-control" name="email" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <input type="password" id="form2Example2" class="form-control" name="password" />
            </div>

            <!-- 2 column grid layout for inline styling -->
            <!-- Checkbox -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="remember_me" name="remember_me" />
                <label class="form-check-label" for="remember_me"> Remember me </label>
            </div>

            <!-- Submit button -->
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
            </div>

            <!-- Register buttons -->
            <div class="text-center">
                <p><a href="{{ route('view-register') }}">Don't have an account? Register Now!</a></p>
            </div>
        </form>
    </div>
@endsection