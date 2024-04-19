@extends('layouts.app')
<!-- Creating a card that displays the fields according to the id of the routes and has linkage and redirects to the other pages of this topic, they are stored in card divs along with titles-->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Route Id :  {{ $route->id }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>Start Location:</strong> {{ $route->start_location }}
                    </div>
                    <div class="mb-3">
                        <strong>End Location:</strong> {{ $route->end_location }}
                    </div>
                    <!-- Add any additional fields you want to display -->
                    <div class="mb-3">
                        <strong>Estimated Departure:</strong> {{ $route->estimated_departure }}
                    </div>

                    <div class="mb-3">
                        <strong>Estimated Arrival:</strong> {{ $route->estimated_arrival }}
                    </div>

                    <div class="mb-3">
                        <strong>Journey Route:</strong> {{ $route->journey_route }}
                    </div>
                    
                    <div>
                        <strong>Private Company Id:</strong><a href="{{ route('private_companies.show', $route->private_company_id) }}">{{ $route->private_company_id }}</a></td>
                    </div>

                    <!-- Back Button -->
                    <a href="{{ route('user.routes.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
