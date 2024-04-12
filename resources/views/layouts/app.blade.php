<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- Dropdown for Schedule -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSchedule" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Schedule
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownSchedule">
                                <a class="nav-link" href="{{ url('/fetch-transport-data') }}">View Schedule</a>
                            </div>
                        </li>
                        <!-- End Dropdown for Schedule -->

                        <!-- Dropdown for Reports -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownReports" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Reports
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownReports">
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                    @auth
                                        @if(auth()->user()->hasRole('admin'))
                                            <a class="nav-link" href="{{ route('admin.reports.index') }}">{{ __('All Reports') }}</a>
                                            <a class="nav-link" href="{{ route('admin.reports.create') }}">{{ __('Create Report') }}</a>
                                        @elseif(auth()->user()->hasRole('user'))
                                            <a class="nav-link" href="{{ route('user.reports.index') }}">{{ __('All Reports') }}</a>
                                            <a class="nav-link" href="{{ route('user.reports.create') }}">{{ __('Create Report') }}</a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPrivateCompanies" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Private Companies
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownPrivateCompanies">
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                    @auth
                                        @if(auth()->user()->hasRole('admin'))
                                            <a class="nav-link" href="{{ route('private_companies.index') }}">{{ __('All Private Companies') }}</a>
                                        @elseif(auth()->user()->hasRole('user'))
                                            <a class="nav-link" href="{{ route('private_companies.index') }}">{{ __('All Private Companies') }}</a>
                                        @elseif(auth()->user()->hasRole('dev'))
                                            <a class="nav-link" href="{{ route('private_companies.index') }}">{{ __('All Private Companies') }}</a>
                                            <a class="nav-link" href="{{ route('private_companies.create') }}">{{ __('Create Private Companies') }}</a>
                                        @else
                                            <a class="nav-link" href="{{ route('private_companies.index') }}">{{ __('All Private Companies') }}</a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </li>
                        <!-- End Dropdown for Reports -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
