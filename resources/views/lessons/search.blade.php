@extends('layouts.master')

@section('title')
    Search for {{ request('key') }} | CourseIn
@endsection

@section('content')
    <h3 class="mb-3">Search result for {{ request('key') }}</h3>

    @if ($lessons->count())
        {{-- Kalau ada, tampilin semua --}}
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($lessons as $lesson)
                <div class="col">
                    <a href="{{ route('lessons.show', $lesson->id) }}" class="text-decoration-none text-dark">
                        <div class="card h-100 lesson-card">
                            {{-- Type Course atau Workshop --}}
                            <span class="badge bg-dark position-absolute top-0 start-0">{{ $lesson->type }}</span>

                            {{-- Lesson details --}}
                            <img src="/storage/{{ $lesson->image }}" class="card-img-top" alt="{{ $lesson->lesson_name }}">
                            <div class="card-body">
                                <h5 class="card-title mb-0">{{ $lesson->lesson_name }}</h5>
                                <small class="card-text text-muted">{{ $lesson->course->course_name }}</small>
                                <p class="card-text my-2 text-primary">{{ $lesson->price }}</p>
                                <small class="card-text">{{ $lesson->course->address }}</small>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-auto px-3 pb-2">
                                {{-- Button love untuk add dan remove wishlist --}}
                                @if (!auth()->guard('user')->check() ||
                                    !auth()->guard('user')->user()->wishlist->hasItem($lesson->id))
                                    {{-- Kalau belum ada di wishlist, ini tombol untuk add nya --}}
                                    <form action="{{ route('wishlist.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                                        <button type="submit" class="btn shadow-none p-0">
                                            <i class="bi bi-heart h4"></i>
                                        </button>
                                    </form>
                                @else
                                    {{-- Kalau sudah ada di wishlist, ini tombol untuk remove nya --}}
                                    <form action="{{ route('wishlist.destroy', $lesson->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn shadow-none p-0">
                                            <i class="bi bi-heart-fill h4 text-danger"></i>
                                        </button>
                                    </form>
                                @endif
                                
                                {{-- Rating lesson --}}
                                <div class="text-warning fw-bold m-0">
                                    <i class="bi bi-star-fill"></i> {{ $lesson->rating }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-end mt-4">
            {{ $lessons->links() }}
        </div>
    @else
        {{-- Kalau kosong, tampilkan pesan --}}
        <div class="d-flex flex-column gap-5 mt-5 p-5">
            <h5 class="text-center text-muted">Sorry, no lesson found.</h5>
            <h1 class="text-center text-muted">(っ °Д °;)っ</h1>
        </div>
    @endif
@endsection
