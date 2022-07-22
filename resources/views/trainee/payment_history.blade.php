@extends('layouts.master')

@section('title', 'Your Payment History | CourseIn')

@section('content')
    <div class="row row-cols-1 row-cols-md-3 mb-4 g-4">
        {{-- <div class="col">
            <div class="card h-100 shadow text-white">
                <div class="card-body rounded d-flex flex-column justify-content-center"
                    style="font-size: 15pt; background-color: #251e73;">
                    <h5 class="card-title"><strong>Total Spendings :</strong></h5>
                    <h1 class="text-center align-items-center my-0">{{ 'IDR ' . number_format($total) }}</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow text-white">
                <div class="card-body rounded d-flex flex-column justify-content-center"
                    style="font-size: 15pt; background-color: #f1c000;">
                    <h5 class="card-title"><strong>Total Transactions :</strong></h5>
                    <h1 class="text-center align-items-center my-0">{{ $payments->count() }} Transactions</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow text-white">
                <div class="card-body rounded d-flex flex-column justify-content-center"
                    style="font-size: 11pt; background-color: #3d796f;">
                    <h5 class="card-title"><strong>Payment Methods :</strong></h5>

                    <h1 class="text-start align-items-center my-0">{{ $payments->where('payment_method', 'Card')->count() }}
                        Card Payments</h1>
                    <h1 class="text-start align-items-center my-0">{{ $payments->where('payment_method', 'QRIS')->count() }}
                        QR Payment</h1>
                </div>
            </div>
        </div> --}}
        <div class="col">
            <div class="card h-100 shadow text-white" style="background-color: #251e73;">
                <div class="card-body rounded d-flex flex-column justify-content-center">
                    <i class="fa-solid fa-coins fa-3x"></i>
                    <h1 class="text-center align-items-center mb-3" style="font-size: 3rem">
                        {{ 'IDR ' . number_format($total) }}</h1>
                    <h4 class="card-title text-center"><strong>Total Spendings</strong></h4>
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


    <h3 class="text-center mt-5 mb-4"><strong>Payment History</strong></h3>
    @if ($payments->count())
        <table class="table table-striped table-responsive col-12">
            <thead>
                <tr>
                    <th class="col-2">Transaction Date</th>
                    <th class="col-5">Lesson Name</th>
                    <th class="col-3">Total Price</th>
                    <th class="col-2">Payment Method</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td class="col-2">{{ $payment->created_at }}</td>
                        <td class="col-5">{{ $payment->lesson->lesson_name }}</td>
                        <td class="col-3">{{ 'IDR ' . number_format($payment->amount) }}</td>
                        <td class="col-2">{{ $payment->payment_method }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="h4 mt-5 mb-4 text-center text-muted">You have no transaction yet.</p>
        <p class="h1 text-center text-muted">(っ °Д °;)っ</p>

    @endif
@endsection
