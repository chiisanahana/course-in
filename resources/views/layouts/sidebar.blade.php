<nav id="sidebarMenu" class="col-1 d-md-block bg-secondary sidebar collapse px-3">
    <div class="position-sticky pt-4">
        <ul class="nav nav-pills flex-column gap-2 mb-auto">
            @if (auth()->guard('user')->check())
                {{-- Sidebar trainee menus --}}
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('dashboard') ? 'text-light active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="bi bi-house-fill h4 m-0"></i>
                        <span class="menu ps-3">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-center" href="#">
                        <i class="bi bi-list-stars h4 m-0"></i>
                        <span class="menu ps-3">Courses</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('wishlist') ? 'text-light active' : '' }}"
                        href="{{ route('wishlist') }}">
                        <i class="bi bi-heart-fill h4 m-0"></i>
                        <span class="menu ps-3">Wishlist</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-center" href="#">
                        <i class="bi bi-credit-card h4 m-0"></i>
                        <span class="menu ps-3">Payment</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('timebtables.index') ? 'text-light active' : '' }}"
                        href="{{ route('timetables.index') }}">
                        <i class="bi bi-calendar-week h4 m-0"></i>
                        <span class="menu ps-3">Schedule</span>
                    </a>
                </li>
            @else
                {{-- Sidebar course menus --}}
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('dashboard') ? 'text-light active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="bi bi-house-fill h4 m-0"></i>
                        <span class="menu ps-3">Dashboard</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-center" href="#">
                        <i class="bi bi-bookmark-star-fill h4 m-0"></i>
                        <span class="menu ps-3">Booking</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('lessons.index') ? 'text-light active' : '' }}"
                        href="{{ route('lessons.index') }}">
                        <i class="bi bi-list-stars h4 m-0"></i>
                        <span class="menu ps-3">Courses</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-center" href="#">
                        <i class="bi bi-credit-card h4 m-0"></i>
                        <span class="menu ps-3">Revenue</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('schedules.index') ? 'text-light active' : '' }}"
                        href="{{ route('schedules.index') }}">
                        <i class="bi bi-calendar-week h4 m-0"></i>
                        <span class="menu ps-3">Schedule</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
