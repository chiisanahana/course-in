@extends('layouts.master')

@section('title', 'Transaction History | CourseIn')

@section('content')

    <h3 class="text-center mt-5 mb-4"><strong>Transaction(s)</strong></h3>
    @if ($payments->count())
        <table class="table table-striped table-responsive col-12">
            <thead>
                <tr>
                    <th class="col-2">Transaction Date</th>
                    <th class="col-2">Trainee</th>
                    <th class="col-2">Course</th>
                    <th class="col-2">Lesson Name</th>
                    <th class="col-2">Total Price</th>
                    <th class="col-2">Payment Method</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td class="col-2">{{ $payment->created_at }}</td>
                        <td class="col-2">{{ $payment->user->name }}</td>
                        <td class="col-2">{{ $payment->lesson->course->name }}</td>
                        <td class="col-2">{{ $payment->lesson->lesson_name }}</td>
                        <td class="col-2">{{ 'IDR ' . number_format($payment->amount) }}</td>
                        <td class="col-2">{{ $payment->payment_method }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="h4 mt-5 mb-4 text-center text-muted">No transaction yet.</p>
        <p class="h1 text-center text-muted">(っ °Д °;)っ</p>

    @endif
@endsection
