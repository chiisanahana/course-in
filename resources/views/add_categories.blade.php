@extends('layouts.master')

@section('title', 'Dashboard | CourseIn')

@section('content')
    <div class="container col-6 rounded position-absolute top-50 start-50 translate-middle bg-secondary p-5 shadow">
        <p class="h3 fw-bold text-center mb-3">Add Category</p>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control me-2 border-primary fs-5 @error('name') is-invalid @enderror" id="name" 
                name="name" placeholder="Category Name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary fs-5 py-1">Add Category</button>
            </div>
        </form>
    </div>
@endsection