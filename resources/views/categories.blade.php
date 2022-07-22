@extends('layouts.master')

@section('title', 'All Categories | CourseIn')

@section('content')
    <h3 class="mb-3">CourseIn Categories</h3>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($categories as $category)
            <div class="col">
                <a href="{{ route('categories.show', $category->id) }}" class="text-decoration-none">
                    <div class="card img-overlay h-100 text-white border-0 shadow">
                        <img src="{{ $category->image }}"
                            class="card-img" alt="{{ $category->name }}">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center overlay-dark">
                            <h4 class="card-title">{{ $category->name }}</h4>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
@endsection
