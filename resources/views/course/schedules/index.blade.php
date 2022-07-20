@extends('layouts.master')

@section('title')
    {{ auth()->guard('course')->user()->name }} Schedule | CourseIn
@endsection

@section('content')
    {{-- * Notes: hanya display jadwal bulan ini --}}
    <h4 class="mb-3">{{ now()->format('F Y') }}</h4>
    @if ($schedules->count())
        <div class="d-flex flex-wrap justify-content-between px-0">
            @foreach ($schedules as $schedule)
                <div class="col-6 {{ $loop->iteration % 2 == 0 ? 'ps-3' : 'pe-3' }}">
                    <div class="card mb-2">
                        <a href="{{ route('schedules.show', $schedule[0]->unformatted_date) }}"
                            class="text-decoration-none text-dark">
                            <div class="row g-0">
                                <div
                                    class="w-25 d-flex flex-column justify-content-center align-items-center bg-info rounded shadow-sm my-2 ms-2 me-5">
                                    <p class="mb-0">{{ date('D', strtotime($schedule[0]->date)) }}</p>
                                    <h4 class="fw-bold">{{ date('j', strtotime($schedule[0]->date)) }}</h4>
                                </div>
                                <div class="w-50">
                                    <div class="card-body d-flex gap-5 align-items-center px-0">
                                        <div class="card-text d-flex flex-column align-items-center gap-2">
                                            <p class="mb-0">Class(es)</p>
                                            <h5 class="fw-bold">{{ $schedule->groupBy('lesson_id')->count() }}</h5>
                                        </div>
                                        <div class="vr"></div>
                                        <div class="card-text d-flex flex-column align-items-center gap-2">
                                            <p class="mb-0">Session(s)</p>
                                            <h5 class="fw-bold">{{ $schedule->groupBy('id')->count() }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="d-flex flex-column w-100 gap-3 mt-5">
            <h5 class="text-center text-muted">There is no schedule for this month.</h5>
            <h1 class="text-center text-muted">(っ °Д °;)っ</h1>
        </div>
    @endif
    <div class="fixed-bottom d-flex justify-content-end">
        <a href="{{ route('schedules.create') }}" type="button"
            class="btn btn-primary rounded-circle shadow px-2 py-1 m-4">
            <i class="bi bi-plus h1"></i>
        </a>
    </div>
@endsection
