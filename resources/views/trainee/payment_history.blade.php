@extends('layouts.master')

@section('title', 'Your Payment History | CourseIn')

@section('content')
    <div class="container card">
        <div class="row">
            <div class="col-6 card-body border">
                Total Spendings
            </div>
            <div class="col-3 card-body">
                Total Transactions
            </div>
            <div class="col-3 card-body">
                <div class="row">
                    Payment with Card
                </div>
                <div class="row">
                    Payment with QRIS
                </div>
            </div>
        </div>
    </div>
@endsection

