<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-primary py-0">
    <div class="container-fluid">
        {{-- Jika belum login, logo mengarah ke landing page --}}
        @if (!(auth()->guard('user')->check() ||
            auth()->guard('course')->check()
        ))
            <a class="navbar-brand" href="{{ route('landing-page') }}">
                <img src="/assets/logo.png" alt="Logo" width="50">
            </a>
            {{-- Jika sudah login, logo mengarah ke dashboard? --}}
        @else
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="/assets/logo.png" alt="Logo" width="50">
            </a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- Button untuk mengakses kategori --}}
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}"
                        href="{{ route('categories.index') }}">Categories</a>
                </li>
            </ul>

            {{-- Search bar --}}
            <div class="col-md-8 d-flex justify-content-center">
                <form action="{{ route('lessons.search') }}" method="GET"
                    class="col-md-8 d-flex bg-light rounded-pill">
                    <input class="form-control rounded-pill shadow-none border-0 ps-3 py-2" type="search"
                        name="key" placeholder="Search lesson" value="{{ request('key') }}">
                    <button class="btn me-2 shadow-none" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>

            {{-- Kalau sudah login, tampilkan nama dan role --}}
            @if (auth()->guard('course')->check())
                {{-- Pengecekan untuk course --}}
                <ul class="col-md-3 navbar-nav gap-3">
                    <div class="my-auto">
                        <a href="{{ route('view-profile',auth()->guard('course')->user()->id) }}">
                            @if (auth()->guard('course')->user()->prof_picture)
                                <img src="{{ asset('/storage/' .auth()->guard('course')->user()->prof_picture) }}"
                                    class="rounded-circle" alt="Profile" width="40" height="40">
                            @else
                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/aa/Sin_cara.png"
                                    class="rounded-circle" alt="Profile" width="40">
                                {{-- <img src="https://img.icons8.com/bubbles/100/000000/user.png"
                                class="img-radius" alt="User-Profile-Image" width="40">> --}}
                            @endif
                        </a>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="m-0 text-light">{{ auth()->guard('course')->user()->name }}</h6>
                        <small class="text-light">Course</small>
                    </div>
                    <li class="nav-item ms-auto">
                        <a class="nav-link h3 m-0" href="{{ route('logout') }}">
                            <i class="bi bi-box-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            @elseif (auth()->guard('user')->check())
                {{-- Pengecekan untuk trainee --}}
                <ul class="ms-auto col-md-2 navbar-nav gap-3">
                    <div>
                        <a href="{{ route('view-profile',auth()->guard('user')->user()->id) }}">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/aa/Sin_cara.png"
                                class="rounded-circle" alt="Profile" width="40" height="40">
                        </a>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="m-0 text-light">{{ Str::words(auth()->guard('user')->user()->name,1,'') }}</h6>
                        @if (auth()->guard('user')->user()->role_id == 2)
                            <small class="text-light">Trainee</small>
                        @else
                            <small class="text-light">Admin</small>
                        @endif
                    </div>
                    <li class="nav-item ms-auto">
                        <a class="nav-link h3 m-0" href="{{ route('logout') }}">
                            <i class="bi bi-box-arrow-right"></i>
                        </a>
                    </li>
                </ul>
                {{-- Kalau belum login, tampilkan tombol login dan register --}}
            @else
                <ul class="navbar-nav mb-2 mb-lg-0 gap-3 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-secondary text-dark px-3 py-1" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-secondary text-dark px-3 py-1"
                            href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
