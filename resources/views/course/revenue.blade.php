@extends('layouts.master')

@section('title', 'Your Revenue | CourseIn')

@section('content')
    <div class="row row-cols-1 row-cols-md-3 mb-4 g-4">
        <div class="col">
            <div class="card h-100 shadow text-white">
                <div class="card-body rounded d-flex flex-column justify-content-center" style="font-size: 15pt; background-color: #251e73;">
                    <h5 class="card-title"><strong>Total Earnings :</strong></h5>
                    <h1 class="text-center align-items-center my-0">{{ 'IDR ' . number_format($total) }}</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow text-white">
                <div class="card-body rounded d-flex flex-column justify-content-center" style="font-size: 15pt; background-color: #f1c000;">
                    <h5 class="card-title"><strong>Total Transactions :</strong></h5>
                    <h1 class="text-center align-items-center my-0">{{$payments->count()}} Transactions</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow text-white">
                <div class="card-body rounded d-flex flex-column justify-content-center" style="font-size: 11pt; background-color: #3d796f;">
                    <h5 class="card-title"><strong>Details :</strong></h5>
                    <h1 class="text-start align-items-center my-0">{{$countCourse}} Lesson(s)</h1>
                    <h1 class="text-start align-items-center my-0">{{$countTrainee}} Trainee(s)</h1>
                </div>
            </div>
        </div>
    </div>


    <h1 class="text-center mt-2 mb-4"><strong>Transaction History</strong></h1>
    <table class="table table-striped table-responsive col-12">
        <thead>
            <tr>
                <th class="col-2">Transaction Date</th>
                <th class="col-4">Trainee Name</th>
                <th class="col-4">Lesson Name</th>
                <th class="col-2">Total Price</th>
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
@endsection
