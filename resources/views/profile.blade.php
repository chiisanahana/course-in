<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CourseIn - Profile</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    @include('layouts.navbar')
    <div class="page-content page-container" id="page-content">
        <form action="{{ route('update-profile') }}" method="POST" class="container padding"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-9 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-10">
                                        <div class="profile-img">
                                            <!-- diganti ke foto user masukin -->
                                            <img src="https://img.icons8.com/bubbles/100/000000/user.png"
                                                class="img-radius" alt="User-Profile-Image">
                                            <div class="file btn btn-lg btn-primary">
                                                <i class="bi bi-pencil-square"></i>
                                                <input type="file" name="file">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- buat nama user -->
                                    <div class="form-outline flex-fill">
                                        <label class="form-label my-0 d-flex justify-content-start" for="form3Example4cd">Name</label>
                                        <input type="text" name="name" id="name" value="{{ $user->name }}">
                                    </div>

                                    <!-- buat user email -->
                                    <div class="form-outline flex-fill">
                                        <label class="form-label my-0 d-flex justify-content-start" for="form3Example4cd">Email</label>
                                        <input type="email" name="email" id="email"
                                            value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h5 class="m-b-20 p-b-5 b-b-default f-w-600">Change Information</h5>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Card Number</p>
                                            <h6 class="text-muted f-w-400">{{ $user->card_number }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Phone</p>
                                            <input type="text" name="wa_number" id="wa_number"
                                                value="{{ $user->wa_number }}">
                                        </div>
                                    </div>
                                    <h5 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Change Password</h5>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">New Password</p>
                                            <input type="password" name="password" id="password">
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Confirm Password</p>
                                            <input type="password" name="confirm_password" id="confirm_password">
                                        </div>
                                    </div>
                                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                                        <li>
                                            Saya mau libur sekarang
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
                </div>
        </form>
    </div>
    </div>
    <script src="/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
