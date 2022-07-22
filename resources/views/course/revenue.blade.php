@extends('layouts.master')

@section('title', 'Your Revenue | CourseIn')

@section('content')
    <div class="row row-cols-1 row-cols-md-3 mb-4 g-4">
        <div class="col">
            <div class="card h-100 shadow text-white" style="background-color: #251e73;">
                <div class="card-body rounded d-flex flex-column justify-content-center">
                    <i class="fa-solid fa-hand-holding-dollar fa-3x"></i>
                    <h1 class="text-center align-items-center mb-3" style="font-size: 3rem">{{ number_format($total) }}</h1>
                    <h4 class="card-title text-center"><strong>Total Earnings</strong></h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow text-white" style="background-color: #f1c000;">
                <div class="card-body rounded d-flex flex-column justify-content-center">
                    <i class="fa-brands fa-cc-visa fa-3x"></i>
                    <h1 class="text-center align-items-center mb-3" style="font-size: 3rem">{{ $cardCount }}</h1>
                    <h4 class="card-title text-center"><strong>Total Transactions by Card</strong></h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow text-white" style=" background-color: #3d796f;">
                <div class="card-body rounded d-flex flex-column justify-content-center">
                    <i class="fa-solid fa-qrcode fa-3x"></i>
                    <h1 class="text-center align-items-center mb-3" style="font-size: 3rem">{{ $qrisCount }}</h1>
                    <h4 class="card-title text-center"><strong>Total Transactions by QRIS</strong></h4>
                </div>
            </div>
        </div>
    </div>


    <h3 class="text-center mt-5 mb-4"><strong>Transaction History</strong></h3>
    @if ($payments->count())
        <table class="table table-striped table-responsive col-12">
            <thead>
                <tr>
                    <th class="col-2">Transaction Date</th>
                    <th class="col-4">Trainee Name</th>
                    <th class="col-4">Lesson Name</th>
                    <th class="col-2">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td class="col-2">{{ $payment->created_at }}</td>
                        <td class="col-4">{{ $payment->user->name }}</td>
                        <td class="col-4">{{ $payment->lesson->lesson_name }}</td>
                        <td class="col-2">{{ 'IDR ' . number_format($payment->amount) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="h3 mb-5 text-center text-muted">Sorry, you have no transaction yet.</p>
        <p class="h1 text-center text-muted">（︶^︶）</p>
    @endif
@endsection
