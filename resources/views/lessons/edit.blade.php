@extends('layouts.master')

@section('title', 'Edit Lesson | CourseIn')

@section('content')
    <h3 class="mb-3 text-center">Edit Lesson</h3>
    <div class="container-fluid col-10 rounded border mt-3 p-4">
        <form action="{{ route('lessons.update', $lesson->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="d-flex mb-4">
                <div class="col-6 pe-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                        <option value="">Choose category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $lesson->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6 ps-3">
                    <label for="type" class="form-label">Choose lesson type</label>
                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                        <option value="">Lesson type</option>
                        <option value="Course" {{ $lesson->type == 'Course' ? 'selected' : '' }}>Course</option>
                        <option value="Workshop" {{ $lesson->type == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="d-flex mb-4">
                <div class="col-6 pe-3">
                    <label for="lesson_name" class="form-label">Lesson name</label>
                    <input type="text" class="form-control @error('lesson_name') is-invalid @enderror" id="lesson_name"
                        name="lesson_name" value="{{ $lesson->lesson_name }}">
                    @error('lesson_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6 ps-3">
                    <label for="lesson_teacher" class="form-label">Lesson teacher</label>
                    <div class="row d-flex">
                        <div class="col-3">
                            <select class="form-select bg-info" id="prefix" name="prefix">
                                <option value="Mr." {{ Str::before($lesson->lesson_teacher, '.') == 'Mr' ? 'selected' : '' }}>Mr.</option>
                                <option value="Mrs." {{ Str::before($lesson->lesson_teacher, '.') == 'Mrs' ? 'selected' : '' }}>Mrs.</option>
                                <option value="Ms." {{ Str::before($lesson->lesson_teacher, '.') == 'Ms' ? 'selected' : '' }}>Ms.</option>
                            </select>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control @error('lesson_teacher') is-invalid @enderror"
                                id="lesson_teacher" name="lesson_teacher" value="{{ Str::after($lesson->lesson_teacher, '. ') }}">
                            @error('lesson_teacher')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    rows="3">{{ $lesson->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex mb-4">
                <div class="col-6 pe-3">
                    <label for="price" class="form-label">Price</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="price">IDR</span>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                            value={{ $lesson->unformatted_price }}>
                        <div class="invalid-feedback">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-6 ps-3">
                    <label for="image" class="form-label">Lesson image</label>
                        <img src="/storage/{{ $lesson->image }}" class="d-block mb-2" alt="{{ $lesson->name }} banner" width="200">
                        <input class="form-control @error('lesson_image') is-invalid @enderror" type="file" accept="image/*"
                            id="image" name="lesson_image">
                    @error('lesson_image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <button type="submit" class="btn btn-primary col-4">Edit lesson</button>
            </div>
        </form>
    </div>
@endsection
