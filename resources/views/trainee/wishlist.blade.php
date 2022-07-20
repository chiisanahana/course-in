@extends('layouts.master')

@section('title', 'Your Wishlist | CourseIn')

@section('content')
    <h3 class="mb-3">Your wished lessons</h3>

    @if ($wishlist_items->count())
        <div class="row row-cols-1 row-cols-md-4 g-4">
            {{-- Kalau ada, tampilin semua --}}
            @foreach ($wishlist_items as $item)
                <div class="col">
                    <a href="{{ route('lessons.show', $item->lesson->id) }}" class="text-decoration-none text-dark">
                        <div class="card h-100 lesson-card">
                            {{-- Type Course atau Workshop --}}
                            <span class="badge bg-dark position-absolute top-0 start-0">{{ $item->lesson->type }}</span>

                            {{-- Lesson details --}}
                            <img src="/storage/{{ $item->lesson->image }}" class="card-img-top"
                                alt="{{ $item->lesson->lesson_name }}">
                            <div class="card-body">
                                <h5 class="card-title mb-0">{{ $item->lesson->lesson_name }}</h5>
                                <small class="card-text text-muted">{{ $item->lesson->course->course_name }}</small>
                                <p class="card-text my-2 text-primary">{{ $item->lesson->price }}</p>
                                <small class="card-text">{{ $item->lesson->course->address }}</small>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-auto px-3 pb-2">
                                {{-- Button love untuk add dan remove wishlist --}}
                                @if (auth()->guard('user')->user()->wishlist->hasItem($item->lesson->id))
                                    {{-- Kalau sudah ada di wishlist, ini tombol untuk remove nya --}}
                                    <form action="{{ route('wishlist.destroy', $item->lesson->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn shadow-none p-0">
                                            <i class="bi bi-heart-fill h4 text-danger"></i>
                                        </button>
                                    </form>
                                @else
                                    {{-- Kalau belum ada di wishlist, ini tombol untuk add nya --}}
                                    <form action="{{ route('wishlist.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="lesson_id" value="{{ $item->lesson->id }}">
                                        <button type="submit" class="btn shadow-none p-0">
                                            <i class="bi bi-heart h4"></i>
                                        </button>
                                    </form>
                                @endif

                                {{-- Rating lesson --}}
                                <div class="text-warning fw-bold m-0">
                                    <i class="bi bi-star-fill"></i> {{ $item->lesson->rating, 1 }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        {{-- Kalau kosong, tampilkan pesan --}}
        <div class="d-flex flex-column gap-5 mt-5 p-5">
            <h5 class="text-center text-muted">Your wishlist is empty</h5>
            <h1 class="text-center text-muted">ಠ╭╮ಠ</h1>
        </div>
    @endif
@endsection
