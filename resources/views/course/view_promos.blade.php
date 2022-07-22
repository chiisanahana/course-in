@extends('layouts.master')

@section('title', 'Dashboard | CourseIn')

@section('content')
    <h3 class="mb-3">On Going Promo Code(s)</h3>

    @if ($promos->count())
        {{-- Kalau ada, tampilin semua --}}
        <div class="row row-cols-1 g-4">
            @foreach ($promos as $promo)
                <div class="card ps-0 mb-2 bg-secondary">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <img src="{{ asset('storage/' . $promo->image) }}" class="img-fluid rounded-start"
                                alt="{{ $promo->code }}">
                        </div>
                        <div class="col d-flex justify-content-between align-items-center pe-4">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $promo->code }}</h5>
                                <p class="h3 card-text">{{ $promo->discount * 100 }}%</p>
                            </div>
                            <div>
                                <p class="h5 text-primary">Expires at {{ $promo->end_date }}</p>
                                <p class="h5 text-primary">Used {{ $promo->usedTimes }} time(s)</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        {{-- Kalau kosong, tampilkan pesan --}}
        <div class="d-flex flex-column gap-5 mt-5 p-5">
            <h5 class="text-center text-muted">No promo is available at the moment...</h5>
            <h1 class="text-center text-muted">(っ °Д °;)っ</h1>
        </div>
    @endif
    <div class="fixed-bottom d-flex justify-content-end">
        <a href="{{ route('promos.create') }}" type="button" class="btn btn-primary rounded-circle shadow px-2 py-1 m-4">
            <i class="bi bi-plus h1"></i>
        </a>
    </div>
@endsection
