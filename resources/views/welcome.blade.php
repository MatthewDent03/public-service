@extends('layouts.app')
<!-- This file is the homepage of the website which contains the routing and links for buttons for users to access different webpages depending on their authenticated role, specific buttons are revealed to each role type -->
@section('content')
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-4">Welcome to our Transport Company Dashboard</h1>
        <p class="lead">Get real-time updates and reports about our transportation services.</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Reports</h5>
                    <p class="card-text">View detailed reports about our transportation services and reviews.</p>
                    
                    @if(auth()->check())
                        @if(auth()->user()->hasRole('admin'))
                            <a href="{{ route('admin.reports.index') }}" class="btn btn-primary">View Reports</a>
                        @elseif(auth()->user()->hasRole('user'))
                            <a href="{{ route('user.reports.index') }}" class="btn btn-primary">View Reports</a>
                            <a href="{{ route('user.reports.create') }}" class="btn btn-primary">Create Reports</a>
                        @elseif(auth()->user()->hasRole('dev'))
                        @else
                        @endif
                    @else
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Private Transportation</h5>
                    <p class="card-text">Get access to our transportation services provided via private companies.</p>
                    
                    @if(auth()->check())
                        @if(auth()->user()->hasRole('admin'))
                            <a href="{{ route('admin.routes.index') }}" class="btn btn-primary">View Private Routes</a>
                        @elseif(auth()->user()->hasRole('user'))
                            <a href="{{ route('user.routes.index') }}" class="btn btn-primary">View Private Routes</a>
                        @elseif(auth()->user()->hasRole('dev'))
                            <a href="{{ route('dev.routes.index') }}" class="btn btn-primary">View Private Routes</a>
                        @else
                            <a href="{{ route('routes.index') }}" class="btn btn-primary">View Private Routes</a>
                        @endif
                        <!-- <a href="{{ route('private_companies.index') }}" class="btn btn-primary">View Private Schedules</a> -->
                    @else
                        <!-- Render login/register buttons or any other alternative -->
                    @endif

                    @if(auth()->check())
                        @if(auth()->user()->hasRole('admin'))
                            <a href="{{ route('admin.stops.index') }}" class="btn btn-primary">View Route Stops</a>
                        @elseif(auth()->user()->hasRole('user'))
                            <a href="{{ route('user.stops.index') }}" class="btn btn-primary">View Route Stops</a>
                        @elseif(auth()->user()->hasRole('dev'))
                            <a href="{{ route('dev.stops.index') }}" class="btn btn-primary">View Route Stops</a>
                        @else
                            <a href="{{ route('stops.index') }}" class="btn btn-primary">View Route Stops</a>
                        @endif
                        <!-- <a href="{{ route('private_companies.index') }}" class="btn btn-primary">View Private Schedules</a> -->
                    @else
                        <!-- Render login/register buttons or any other alternative -->
                    @endif

                    <a href="{{ route('private_companies.index') }}" class="btn btn-primary">View Private Companies</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Live Schedule Updates</h5>
                    <p class="card-text">Get live updates about our transportation operations and scheduling.</p>
                    <a href="/fetch-transport-data" class="btn btn-primary">View Live Schedules</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
