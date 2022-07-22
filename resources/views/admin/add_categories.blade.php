@extends('layouts.master')

@section('title', 'Add Category | CourseIn')

@section('content')
    <div class="container col-6 rounded position-absolute top-50 start-50 translate-middle bg-secondary p-5 shadow">
        <p class="h3 fw-bold text-center mb-3">Add Category</p>
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-outline mb-3">
                <label class="form-label my-0" for="form3Example4cd"><strong>Category Name</strong></label>
                <input type="text" class="form-control me-2 border-primary fs-5 @error('name') is-invalid @enderror"
                    id="name" name="name" placeholder="Category Name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-outline mb-3">
                <label class="form-label mb-0" for="form3Example4cd"><strong>Image (must be jpg, jpeg, svg, webp, avif or
                        png)</strong></label> <br>
                <input type="file" name="image"
                    accept="image/png, image/jpeg, image/jpg, image/svg, image/webp, image/avif"
                    class="form-control me-2 border-primary fs-5 @error('image') is-invalid @enderror">
                @if ($errors->has('image'))
                    <div class="error text-danger">
                        {{ $errors->first('image') }}</div>
                @endif
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary fs-5 py-1">Add Category</button>
            </div>
        </form>
    </div>
@endsection
