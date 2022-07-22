<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CourseIn - Payment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="{{asset('css/payment.css')}}">
</head>
<body>
    <div class="container d-lg-flex"> 
        <div class="box-1 bg-light user"> 
            <div class="d-flex align-items-center mb-3"> 
                {{-- <img src="https://images.pexels.com/photos/4925916/pexels-photo-4925916.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="pic rounded-circle" alt=""> --}}
                <p class="name">{{$lesson->course->name}}</p> </div> <div class="box-inner-1 pb-3 mb-3 ">
                    <div class="d-flex justify-content-between mb-3 userdetails">
                        <p class="fw-bold">{{$lesson->lesson_name}}</p> <p class="fw-lighter">
                            <span class="fas"></span>{{$lesson->price}}
                        </p> 
                    </div> 
                <div id="my" class="carousel slide carousel-fade img-details" data-bs-ride="carousel" data-bs-interval="2000">
                    <div class="carousel-indicators"> 
                        <button type="button" data-bs-target="#my" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#my" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#my" data-bs-slide-to="2" aria-label="Slide 3"></button> 
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/storage/{{ $lesson->image }}" class="d-block w-100">
                        </div>
                        <!-- <div class="carousel-item">
                            <img src="https://www.washingtonpost.com/resizer/LYYkc1FmbwpZYFzU0IeEcRKP9Ww=/arc-anglerfish-washpost-prod-washpost/public/QABCS7GJJYI6XBYIMSMR6KWPFA.jpg" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="https://asset.kompas.com/crops/-yBjbIrgjzRHRm9IdGFAB0SckGQ=/0x0:1000x667/750x500/data/photo/2020/08/24/5f435a57bc02d.jpg" class="d-block w-100">
                        </div> -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#my" data-bs-slide="prev">
                        <div class="icon">
                            <span class="fas fa-arrow-left"></span>
                        </div>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#my" data-bs-slide="next">
                        <div class="icon">
                            <span class="fas fa-arrow-right"></span>
                        </div>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <p class="dis my-3 info">{{$lesson->description}}</p>
                <p class="dis mb-3 updates">Teacher: <b>{{$lesson->lesson_teacher}}</b></p>
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
                    <input class="form-control text-uppercase @error('promo_code') is-invalid @enderror" type="text" value="{{$promo}}" id="discount" name="promo_code" readonly>
                    <a href="{{route('browse-promo', [$lesson->id, 2])}}" style="text-decoration:none;"><small class="dis">Browse Promo</small></a>
                </div>
            </div> 
        
            <form action="{{route('validate-qr', $lesson->id)}}" method="post">
                @csrf
                <input type="hidden" name="total_price" id="total_price" value="{{$total_price}}">
                <div class="box-2 pt-0"> 
                    <div class="box-inner-2"> 
                        <div class="d-flex flex-column align-items-center mb-2">
                          <img src="{{asset('assets/contohqris.jpg')}}" alt="" width="180">
                        </div>

                        <div class="d-flex flex-column dis"> 
                            <div class="d-flex align-items-center justify-content-between mb-2"> 
                                <p>Subtotal</p> 
                                <p><span class="fas"></span>{{'IDR '.number_format($lesson->unformatted_price)}}</p> 
                            </div> 
                            <div class="d-flex align-items-center justify-content-between mb-2"> 
                                <div class="d-flex align-items-center"> 
                                    <p class="pe-2">Discount 
                                    </p> 
                                </div> 
                                <p>
                                    <span class="fas"></span>- {{'IDR '.number_format($discounted_price)}}
                                </p> 
                            </div> 
                            <div class="d-flex align-items-center justify-content-between mb-2"> 
                                <p>Platform Fee</p> 
                                <p><span class="fas"></span>IDR 3,000</p> 
                            </div> 
                            <div class="d-flex align-items-center justify-content-between mb-2"> 
                                <p class="fw-bold">Total</p> 
                                <p"><span class="fas"><strong>{{'IDR '.number_format($total_price)}}</strong></span></p> 
                            </div>
                            <input type="hidden" name="promo_code" value="{{$promo}}">
                            <button type="submit" style="text-decoration: none; border:none; background-color:white">
                                <div class="btn btn-primary mt-2">
                                    VERIFY MY PAYMENT
                                </div> 
                            </button>
                        </div> 
                    </div> 
                </div>
            </form>
        </div>
    </div>
    <script src="{{asset('js/payment.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
</body>
</html>