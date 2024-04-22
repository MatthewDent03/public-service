@extends('layouts.app')
<!-- this displays all the routes that have been submitted on a page that has pagination to allow for organised page layout, they are displayed in a table and contain routing and linkage
to allow users to be redirected correctly and access content according to their role type -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <h1 class="text-center mb-4 text-dark">All Private Company Routes</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Start Location</th>
                        <th scope="col">End Location</th>
                        <th scope="col">Estimated Departure</th>
                        <th scope="col">Estimated Arrival</th>
                        <th scope="col">Journey Route</th>
                        <th scope="col">Stop Number</th>
                        <th scrope="col">Private Company Id</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($routes as $route)
                        <tr>
                        <th scope="row">{{ $route->id }}</th>
                        <td>{{ $route->start_location }}</td>
                        <td>{{ $route->end_location }}</td>
                        <td>{{ $route->estimated_departure }}</td>
                        <td>{{ $route->estimated_arrival }}</td>
                        <td>{{ $route->journey_route }}</td>
                        <td>    
                            @foreach($route->stops as $stop)
                                <a href="{{ route('dev.stops.show', ['stop' => $stop->id]) }}">{{ $stop->number }}</a>
                            @endforeach
                        </td>
                        <td><a href="{{ route('private_companies.show', $route->private_company_id) }}">{{ $route->private_company_id }}</a></td>
                        <td>
                            <a href="{{ route('dev.routes.show', $route->id) }}" class="btn btn-primary btn-sm">{{ __('View') }}</a>
                            <a href="{{ route('dev.routes.edit', $route->id) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                            <!-- Add Delete Button with Form -->
                            <form action="{{ route('dev.routes.destroy', $route->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to delete this route?')">{{ __('Delete') }}</button>
                            </form>
                        </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">{{ __('No routes found.') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- Pagination Links -->
                {{ $routes->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
