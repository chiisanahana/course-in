<nav id="sidebarMenu" class="col-1 d-md-block bg-secondary sidebar collapse px-3">
    <div class="position-sticky pt-4">
        <ul class="nav nav-pills flex-column gap-2 mb-auto">
            @if (auth()->guard('user')->check())
                {{-- Sidebar trainee menus --}}
                @if (auth()->guard('user')->user()->role_id == 2)
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('dashboard') ? 'text-light active' : '' }}"
                            href="{{ route('dashboard') }}">
                            <i class="bi bi-house-fill h4 m-0"></i>
                            <span class="menu ps-3">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('lessons.trainee') ? 'text-light active' : '' }}"
                            href="{{ route('lessons.trainee') }}">
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
                        <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('payment-history') ? 'text-light active' : '' }}"
                            href="{{ route('payment-history') }}" href="">
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
                    {{-- Sidebar admin menus --}}
                @else
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('dashboard') ? 'text-light active' : '' }}"
                            href="{{ route('dashboard') }}">
                            <i class="bi bi-house-fill h4 m-0"></i>
                            <span class="menu ps-3">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('categories.create') ? 'text-light active' : '' }}"
                            href="{{ route('categories.create') }}">
                            <i class="bi bi-plus-square-fill h4 m-0"></i>
                            <span class="menu ps-3">Add Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('view-update') ? 'text-light active' : '' }}"
                            href="{{ route('view-update') }}">
                            <i class="bi bi-pencil-square h4 m-0"></i>
                            <span class="menu ps-3">Edit Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('view-transaction') ? 'text-light active' : '' }}"
                            href="{{ route('view-transaction') }}">
                            <i class="bi bi-cash-stack h4 m-0"></i>
                            <span class="menu ps-3">Transaction</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('view-promo') ? 'text-light active' : '' }}"
                            href="{{ route('view-promo') }}">
                            <i class="bi bi-tags-fill h4 m-0"></i>
                            <span class="menu ps-3">Promo</span>
                        </a>
                    </li>
                @endif
            @else
                {{-- Sidebar course menus --}}
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('dashboard') ? 'text-light active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="bi bi-house-fill h4 m-0"></i>
                        <span class="menu ps-3">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('lessons.index') ? 'text-light active' : '' }}"
                        href="{{ route('lessons.index') }}">
                        <i class="bi bi-list-stars h4 m-0"></i>
                        <span class="menu ps-3">Courses</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('view-revenue') ? 'text-light active' : '' }}"
                        href="{{ route('view-revenue') }}">
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
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-center {{ Request::routeIs('view-promo') ? 'text-light active' : '' }}"
                        href="{{ route('view-promo') }}">
                        <i class="bi bi-tags-fill h4 m-0"></i>
                        <span class="menu ps-3">Promo</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
