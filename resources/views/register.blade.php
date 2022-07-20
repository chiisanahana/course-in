@extends('layouts.master')

@section('title', 'Register | CourseIn')
@section('content')
    <body style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign Up</p>

                                    <form class="mx-1 mx-md-4" action="{{ route('register') }}" method="post">
                                        @csrf

                                        <p class="ps-3 mb-1">Account Type</p>
                                        <div class="d-flex ps-3 gap-5 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="role" id="course"
                                                    value=1>
                                                <label class="form-check-label" for="course">
                                                    Course
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="role" id="trainee"
                                                    value=2 checked>
                                                <label class="form-check-label" for="trainee">
                                                    Trainee
                                                </label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="name">Name</label>
                                                <input type="text" id="name"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" />
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                                <input type="email" id="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" />
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" id="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" />
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="confirm_password">Confirm
                                                    password</label>
                                                <input type="password" id="confirm_password"
                                                    class="form-control @error('confirm_password') is-invalid @enderror"
                                                    name="confirm_password" />
                                                @error('confirm_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="wa_number">WA Number</label>
                                                <input type="text" id="wa_number"
                                                    class="form-control @error('wa_number') is-invalid @enderror"
                                                    name="wa_number" value="{{ old('wa_number') }}" />
                                                @error('wa_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label for="address">Address</label>
                                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" rows="3" name="address">{{ old('address') }}</textarea>
                                                @error('address')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        {{-- <div class="form-check d-flex justify-content-center">
                          <input class="form-check-input me-2" name="terms"
                          type="checkbox" value="" id="terms" checked/>
                          <label class="form-check-label" for="terms">
                            I agree all statements in <a href="#">Terms of service</a>
                          </label>
                         
                        </div> --}}
                                        {{-- @error('terms')<div class="text-danger ps-3">The checkbox must be checked.</div>@enderror --}}



                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 mt-5">
                                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                        <!-- Login buttons -->
                                        <div class="text-center">
                                            <p><a href="{{ route('view-login') }}">Already have an account? Login
                                                    Now!</a></p>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://media.istockphoto.com/vectors/people-enjoying-hobbies-cartoon-characters-vector-illustration-vector-id1209354730?k=20&m=1209354730&s=612x612&w=0&h=OuZ3zacxuFjXYl8Qxj3gp8FJDsZ3EQMEkAS1K111CY4="
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
