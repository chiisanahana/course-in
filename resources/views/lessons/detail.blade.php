@extends('layouts.master')

@section('title')
    {{ $lesson->lesson_name }} | CourseIn
@endsection

@section('content')
    <div class="jumbotron jumbotron-fluid bg-info p-3 m-2 rounded">
        <div class="container">
            <h1 class="display-5 mt-4 mb-4">{{ $lesson->lesson_name }}</h1>
            <p class="lead">{{ $lesson->description }}</p>
        </div>
    </div>

    <div class="container-fluid p-0 mt-4 d-flex gap-5">
        <div class="container px-2">
            <h5 class="mb-0"><i class="bi bi-geo-alt-fill"> </i>Location :</h5>
            <p>{{ $lesson->course->name }},<br>
                {{ $lesson->course->address }}</p>
            <h5 class="mb-0"><i class="bi bi-whatsapp"> </i>Contact :</h5>
            <p>{{ $lesson->course->wa_number }}</p>
            @if ($lesson->type == 'Course')
                <h5 class="mb-0"><i class="bi bi-calendar-check"> </i>Available course schedule :</h5>
                @if ($schedules->count())
                    <table class="table mb-5 mt-2">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Date</th>
                                <th scope="col" class="text-center">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td class="text-center">{{ $schedule->date }}</td>
                                    <td class="text-center">{{ $schedule->schedule_time }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-muted">No schedule available yet.</p>
                @endif
                {{ $schedules->links() }}
            @else
                <h5 class="mb-0"><i class="bi bi-calendar-check"> </i>Workshop date :</h5>
                <p>{{ $schedules[0]->full_date }}</p>
            @endif
            {{-- <hr class="my-4"> --}}
            <p class="h5">Join the {{ Str::lower($lesson->type) }} now!</p>
            <div class="h5 text-primary fw-bold">{{ $lesson->price }}</div>
            <div class="d-flex gap-3 mt-5">
                @if (auth()->guard('course')->check() &&
                    auth()->guard('course')->user()->id == $lesson->course_id)
                    {{-- Button untuk edit lesson --}}
                    <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-outline-primary col-5 fs-5 py-1">
                        Edit lesson
                    </a>
                    {{-- Untuk trainee atau guest --}}
                @elseif (!auth()->guard('course')->check())
                    @if ($schedules->count())
                        {{-- Button untuk booking, dengan payment method --}}
                        <div id="payment_methods" class="btn-group dropup col-5">
                            <button type="button" class="btn btn-primary dropdown-toggle fw-bold fs-5 py-0"
                                data-bs-toggle="dropdown">
                                I'M IN
                            </button>
                            <ul class="dropdown-menu bg-secondary w-100 shadow">
                                <li><a class="dropdown-item h5" href="{{ route('view-payment', $lesson->id) }}">
                                        Pay by Card</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item h5" href="{{ route('qr-payment', $lesson->id) }}">Pay by
                                        QRIS</a></li>
                            </ul>
                        </div>
                    @else
                        <button class="btn btn-primary col-5 fs-5 py-1" disabled>I'M IN!</button>
                    @endif

                    {{-- Button untuk wishlist --}}
                    @if (!auth()->guard('user')->check() ||
                        auth()->guard('user')->user()->role_id == 2 ||
                        !auth()->guard('user')->user()->wishlist->hasItem($lesson->id))
                        {{-- Kalau belum ada di wishlist, ini tombol untuk add nya --}}
                        <form action="{{ route('wishlist.store') }}" method="POST" class="col-5">
                            @csrf
                            <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                            <button type="submit" class="btn btn-outline-primary col-12 fs-5 py-1">
                                Add to wishlist
                            </button>
                        </form>
                    @else
                        {{-- Kalau sudah ada di wishlist, ini tombol untuk remove nya --}}
                        <form action="{{ route('wishlist.destroy', $lesson->id) }}" method="POST" class="col-5">
                            @csrf
                            <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                            <button type="submit" class="btn btn-outline-primary col-12 fs-5 py-1">
                                Remove from wishlist
                            </button>
                        </form>
                    @endif
                @endif
            </div>
        </div>

        <div class="container px-2">
            <img src="/storage/{{ $lesson->image }}" class="rounded float-end d-block w-100" alt="lesson_image">
        </div>
    </div>
@endsection
