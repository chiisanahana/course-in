@extends('layouts.master')

@section('title', 'Add Promo')

@section('content')
    <h3 class="mb-3 text-center">Add Promo</h3>
    <div class="container-fluid col-10 rounded border mt-3 py-3">
        <form action="{{ route('promos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 pe-3 mb-4">
                <label for="lesson" class="form-label">Lesson</label>
                <select class="form-select @error('lesson') is-invalid @enderror" id="lesson" name="lesson">
                    <option value="" {{ old('lesson') ? '' : 'selected' }}>Select lesson</option>
                    @foreach ($lessons as $lesson)
                        <option value="{{ $lesson->id }}" {{ $lesson->id == old('lesson') ? 'selected' : '' }}>
                            {{ $lesson->lesson_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between mb-4">
                <div class="col-md-6 pe-3">
                    <label for="discount" class="form-label">Discount rate</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('discount') is-invalid @enderror" name="discount"
                            id="discount" value="{{ old('discount') }}" placeholder="Discount rate">
                        <span class="input-group-text">%</span>
                        @error('discount')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 ps-3">
                    <label for="code" class="form-label">Promo code</label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                        name="code" value="{{ old('code') }}" placeholder="Promo code">
                    @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between mb-4">
                <div class="col-md-6 pe-3">
                    <label for="end_date" class="form-label">Promo end date</label>
                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date"
                        name="end_date" value="{{ old('end_date') }}">
                    @error('end_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 ps-3 mb-3">
                    <label for="image" class="form-label">Promo banner (landscape)</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" accept="image/*"
                        id="image" name="image">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary col-4">Add Promo</button>
            </div>
        </form>
    </div>
@endsection
