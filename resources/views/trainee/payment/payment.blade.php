<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CourseIn - Payment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
</head>

<body>
    <div class="container d-lg-flex">
        <div class="box-1 bg-light user">
            <div class="d-flex align-items-center mb-3">
                {{-- <img src="https://images.pexels.com/photos/4925916/pexels-photo-4925916.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="pic rounded-circle" alt=""> --}}
                <p class="name">{{ $lesson->course->name }}</p>
            </div>
            <div class="box-inner-1 pb-3 mb-3 ">
                <div class="d-flex justify-content-between mb-3 userdetails">
                    <p class="fw-bold">{{ $lesson->lesson_name }}</p>
                    <p class="fw-lighter">
                        <span class="fas"></span>{{ $lesson->price }}
                    </p>
                </div>
                <div id="my" class="carousel slide carousel-fade img-details" data-bs-ride="carousel"
                    data-bs-interval="2000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/storage/{{ $lesson->image }}" class="d-block w-100">
                        </div>
                    </div>
                </div>
                <p class="dis my-3 info">{{ $lesson->description }}</p>
                <p class="dis mb-3 updates">Teacher: <b>{{ $lesson->lesson_teacher }}</b></p>
                <p class="dis mb-3 different">Lesson type:</p>
                <div class="dis">
                    <p class="black">
                        <span class="fas fa-arrow-right mb-3 pe-2"></span>Course
                    </p>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column">
            <div class="box-2">
                <div class="box-inner-2">
                    <div>
                        <p class="fw-bold">Payment Details</p>
                        <p class="dis mb-3">Complete your purchase by providing your payment details</p>
                    </div>
                    <p class="dis fw-bold mb-2">Discount Code</p>
                    <input class="form-control text-uppercase @error('promo_code') is-invalid @enderror" type="text"
                        value="{{ $promo }}" id="discount" name="promo_code" readonly>
                    <a href="{{ route('browse-promo', [$lesson->id, 1]) }}" style="text-decoration:none;"><small
                            class="dis">Browse Promo</small></a>
                </div>
            </div>

            <form action="{{ route('validate-payment', $lesson->id) }}" method="post">
                @csrf
                <input type="hidden" name="total_price" id="total_price" value="{{ $total_price }}">
                <div class="box-2 pt-0">
                    <div class="box-inner-2">

                        <div class="mb-3">
                            <p class="dis fw-bold mb-2">Email address</p>
                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                value="{{ old('email') }}" name="email">
                        </div>
                        <div>
                            <p class="dis fw-bold mb-2">Card details</p>
                            <div class="d-flex align-items-center justify-content-between card-atm border rounded">
                                <div class="fab fa-cc-visa ps-3"></div>
                                <input type="text" class="form-control @error('card_details') is-invalid @enderror"
                                    placeholder="Card Details" name="card_details"
                                    value="{{ auth()->guard('user')->user()->card_number? auth()->guard('user')->user()->card_number: '' }}">
                                <div class="d-flex w-50">
                                    <input type="text"
                                        class="form-control px-0 @error('exp_date') is-invalid @enderror"
                                        placeholder="MM/YY" name="exp_date" value="{{ old('exp_date') }}">
                                    <input type="password" maxlength=3
                                        class="form-control px-0 @error('cvv') is-invalid @enderror" placeholder="CVV"
                                        name="cvv" value="{{ old('cvv') }}">
                                </div>
                            </div>
                            <div class="my-3 cardname">
                                <p class="dis fw-bold mb-2">Cardholder name</p>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column dis">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p>Subtotal</p>
                            <p><span class="fas"></span>{{ 'IDR ' . number_format($lesson->unformatted_price) }}
                            </p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="d-flex align-items-center">
                                <p class="pe-2">Discount
                                    {{-- <span class="d-inline-flex align-items-center justify-content-between bg-light px-2 couponCode"> 
                                            <span id="code" class="pe-2"></span> <span class="fas fa-times close"></span> 
                                        </span> --}}
                                </p>
                            </div>
                            <p>
                                <span class="fas"></span>- {{ 'IDR ' . number_format($discounted_price) }}
                            </p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p>Platform Fee</p>
                            <p><span class="fas"></span>IDR 3,000</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p class="fw-bold">Total</p>
                            <p"><span
                                    class="fas"><strong>{{ 'IDR ' . number_format($total_price) }}</strong></span>
                                </p>
                        </div>
                        <input type="hidden" name="promo_code" value="{{ $promo }}">
                        <button type="submit" style="text-decoration: none; border:none; background-color:white">
                            <div class="btn btn-primary mt-2">
                                Pay
                                <span class="fas px-1"></span>{{ 'IDR ' . number_format($total_price) }}
                            </div>
                        </button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
    <script src="{{ asset('js/payment.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>
