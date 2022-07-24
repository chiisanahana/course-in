<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/sidebar.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <title>@yield('title')</title>
</head>

<body>
    @include('sweetalert::alert')

    @if (request()->routeIs('view-login') || request()->routeIs('view-register'))
        <div class="container-fluid pt-3 pb-2 mb-3">
            @yield('content')
        </div>
    @else
        @include('layouts.navbar')

        @if (request()->routeIs('landing-page') ||
            !(
                auth()->guard('user')->check() ||
                auth()->guard('course')->check()
            ))
            <div class="container-fluid py-3 px-md-4">
                @yield('content')
            </div>
        @else
            <div class="container-fluid">
                <div class="row">
                    @include('layouts.sidebar')

                    <main id="mainContent" class="col-11 ms-sm-auto px-md-4">
                        <div class="container-fluid pt-3 pb-2 mb-3">
                            @yield('content')
                        </div>
                    </main>
                </div>
            </div>
        @endif
    @endif

    <script src="/js/app.js"></script>
    <script src="/js/sidebar.js"></script>
    <script src="https://kit.fontawesome.com/f2d0d59235.js" crossorigin="anonymous"></script>

</body>

</html>
