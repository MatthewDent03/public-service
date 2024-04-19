@extends('layouts.app')
<!-- this displays all the stops that have been submitted on a page that has pagination to allow for organised page layout, they are displayed in a table and contain routing and linkage
to allow users to be redirected correctly and access content according to their role type -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <h1 class="text-center mb-4 text-dark">All Private Route Stops</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Location Name</th>
                        <th scope="col">Number</th>
                        <th scope="col">Estimated Arrival Time</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($stops as $stop)
                        <tr>
                        <th scope="row">{{ $stop->id }}</th>
                        <td>{{ $stop->location_name }}</td>
                        <td>{{ $stop->number }}</td>
                        <td>{{ $stop->estimated_arrival_time }}</td>

                        <td>
                            <a href="{{ route('admin.stops.show', $stop->id) }}" class="btn btn-primary btn-sm">{{ __('View') }}</a>                        </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">{{ __('No stops found.') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- Pagination Links -->
                {{ $stops->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
