@extends('layouts.master')

@section('title', 'Rating | CourseIn')

@section('content')
    <h1>Rate Courses</h1>
    @if ($transactions->count())
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($transactions as $t)
                <form action="" method="post">
                    @csrf
                    <div class="col">
                        <div class="card">
                            <img src="/storage/{{ $t->lesson->image }}" class="card-img-top" alt="{{ $t->lesson->image }}"
                                style="object-fit:cover; height:200px;">
                            <div class="card-body">
                                <input type="hidden" name="payment_id" value="{{ $t->id }}">
                                <h5 class="card-title">{{ $t->lesson->lesson_name }} with {{ $t->lesson->lesson_teacher }}
                                </h5>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <label for="ratings">Your Ratings</label>
                                        <input type="number" name="ratings" id="ratings" style="width: 40px;"
                                            min="1" max="10">&nbsp;/10
                                    </div>
                                    <button type="submit" class="btn btn-primary justify-content-end">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    @else
        <div class="d-flex flex-column gap-3 mt-5">
            <h5 class="text-center text-muted">Sorry, nothing to rate here.</h5>
            <h1 class="text-center text-muted">（︶^︶）</h1>
        </div>
    @endif
@endsection
