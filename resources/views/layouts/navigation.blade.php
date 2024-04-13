<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <x-application-logo class="d-inline-block align-top" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link{{ request()->routeIs('dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        <a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
    </div>

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    @if(auth()->user()->hasRole('admin'))
        <a class="nav-link" href="{{ route('admin.reports.index') }}">{{ __('All Reports') }}</a>
        <a class="nav-link" href="{{ route('admin.reports.create') }}">{{ __('Create Report') }}</a>
    @elseif(auth()->user()->hasRole('user'))
        <a class="nav-link" href="{{ route('user.reports.index') }}">{{ __('All Reports') }}</a>
    @else
        <a class="nav-link" href="{{ route('reports.index') }}">{{ __('All Reports') }}</a>
    @endif

    </div>
    
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        @if(auth()->user()->hasRole('admin'))
            <a class="nav-link" href="{{ route('admin.reports.create') }}">{{ __('Create Report') }}</a>
        @endif
    </div>         

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    @if(auth()->user()->hasRole('admin'))
        <a class="nav-link" href="{{ route('private_companies.index') }}">{{ __('All Private Companies') }}</a>
        <a class="nav-link" href="{{ route('private_companies.create') }}">{{ __('Create Private Company') }}</a>
    @elseif(auth()->user()->hasRole('user'))
        <a class="nav-link" href="{{ route('private_companies.index') }}">{{ __('All Private Companies') }}</a>
    @else
        <a class="nav-link" href="{{ route('private_companies.index') }}">{{ __('All Private Companies') }}</a>
    @endif

    </div>

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    @if(auth()->user()->hasRole('admin'))
        <a class="nav-link" href="{{ route('admin.routes.index') }}">{{ __('All routes') }}</a>
        <a class="nav-link" href="{{ route('admin.routes.create') }}">{{ __('Create Report') }}</a>
    @elseif(auth()->user()->hasRole('user'))
        <a class="nav-link" href="{{ route('user.routes.index') }}">{{ __('All routes') }}</a>
    @else
        <a class="nav-link" href="{{ route('routes.index') }}">{{ __('All routes') }}</a>
    @endif

    </div>

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    @if(auth()->user()->hasRole('admin'))
        <a class="nav-link" href="{{ route('admin.stops.index') }}">{{ __('All stops') }}</a>
    <!-- @elseif(auth()->user()->hasRole('user'))
        <a class="nav-link" href="{{ route('user.routes.index') }}">{{ __('All routes') }}</a>
    @else
        <a class="nav-link" href="{{ route('routes.index') }}">{{ __('All routes') }}</a>
    @endif -->

    </div>

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200">
        <div class="px-4">
            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
            </form>
        </div>
    </div>
</div>
