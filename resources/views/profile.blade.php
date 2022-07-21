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
                <!-- passing id user dan role -->
                <input type="hidden" name="id" value="{{ $user->id }}">
                <input type="hidden" name="role" value="{{ $user->role_id }}">
                <div class="row container d-flex justify-content-center">
                    <div class="col-xl-9 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-10">
                                            <div class="profile-img">
                                                <!-- diganti ke foto user masukin -->
                                                @if ($user->prof_picture)
                                                    <img src="{{ asset('/storage/' . $user->prof_picture) }}"
                                                        class="rounded-circle shadow" alt="Profile">
                                                @else
                                                    {{-- <img src="https://img.icons8.com/bubbles/100/000000/user.png"
                                                        class="img-radius" alt="User-Profile-Image"> --}}
                                                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/aa/Sin_cara.png"
                                                        class="img-radius rounded-circle" alt="User-Profile-Image">
                                                @endif
                                                <div class="file btn btn-lg btn-primary">
                                                    <i class="bi bi-pencil-square"></i>
                                                    <input type="file" name="prof_picture"
                                                        accept="image/png, image/jpeg, image/jpg, image/svg"
                                                        class="@error('prof_picture') is-invalid @enderror">
                                                    @if ($errors->has('prof_picture'))
                                                        <div class="error text-danger">
                                                            {{ $errors->first('prof_picture') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- buat nama user -->
                                        <div class="form-outline flex-fill">
                                            <label class="form-label my-0 d-flex justify-content-start"
                                                for="form3Example4cd">Name</label>
                                            <input class="d-flex justify-content-start"
                                                style="font-size: 7pt; width: 12rem; height: 30px" type="text"
                                                name="name" id="name" value="{{ $user->name }}"
                                                class="@error('name') is-invalid @enderror">
                                            @if ($errors->has('name'))
                                                <div class="error text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>

                                        <!-- buat user email -->
                                        <div class="form-outline flex-fill">
                                            <label class="form-label my-0 d-flex justify-content-start"
                                                for="form3Example4cd">Email</label>
                                            <input class="d-flex justify-content-start"
                                                style="font-size: 7pt; width: 12rem; height: 30px" type="email"
                                                name="email" id="email" value="{{ $user->email }}"
                                                class="@error('email') is-invalid @enderror">
                                            @if ($errors->has('email'))
                                                <div class="error text-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h5 class="m-b-20 p-b-5 b-b-default f-w-600">Change Information</h5>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Card Number</p>
                                                <input type="text" name="card_number" id="card_number"
                                                    value="{{ $user->card_number }}"
                                                    class="@error('card_number') is-invalid @enderror">
                                                @if ($errors->has('card_number'))
                                                    <div class="error text-danger">{{ $errors->first('card_number') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Phone</p>
                                                <input type="text" name="wa_number" id="wa_number"
                                                    value="{{ $user->wa_number }}"
                                                    class="@error('wa_number') is-invalid @enderror">
                                                @if ($errors->has('wa_number'))
                                                    <div class="error text-danger">{{ $errors->first('wa_number') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <h5 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Change Password</h5>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">New Password</p>
                                                <input type="password" name="password" id="password" value=""
                                                    class="@error('password') is-invalid @enderror">
                                                @if ($errors->has('password'))
                                                    <div class="error text-danger">{{ $errors->first('password') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Confirm Password</p>
                                                <input type="password" name="confirm_password" id="confirm_password"
                                                    value=""
                                                    class="@error('confirm_password') is-invalid @enderror">
                                                @if ($errors->has('confirm_password'))
                                                    <div class="error text-danger">
                                                        {{ $errors->first('confirm_password') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- <h5 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Set </h5> -->
                                        <div class="row m-b-20 m-t-40">
                                            <div class="col-sm-6">
                                                <!-- buat if untuk cek apakah libur == true, kalau true nampil teks apakah ingin memulai kembali les -->
                                                <div class="d-flex gap-2 align-items-center">
                                                    @if ($user->role_id == 1)
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" name="checkbox" id="day_off"
                                                                {{ $user->active == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="day_off">LIBORRRR</label>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
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
