@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-10">
            <!-- Add this link in your HTML -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            View Bookmarked Routes
            </a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Bookmarked Routes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
            <ul id="bookmarkedRoutes">
    </ul>
            </div>
            </div>
                        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Start Location</th>
                        <th scope="col">End Location</th>
                        <th scope="col">Estimated Departure</th>
                        <th scope="col">Estimated Arrival</th>
                        <th scope="col">Journey Route</th>
                        <th scope="col">Private Company Id</th>
                        <th scope="col">Stop Number</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Bookmark</th>
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
                                <a href="{{ route('user.stops.show', ['stop' => $stop->id]) }}">{{ $stop->number }}</a>
                            @endforeach
                        </td>
                        <td><a href="{{ route('private_companies.show', $route->private_company_id) }}">{{ $route->private_company_id }}</a></td>

                        <td>
                            <a href="{{ route('user.routes.show', $route->id) }}" class="btn btn-primary btn-sm">{{ __('View') }}</a>                        </td>
                        <td>
                        <div>
                            <input class="form-check-input" type="checkbox" id="checkbox_{{ $route->id }}" value="" aria-label="..." onchange="saveBookMark({{ $route->id }})">
                        </div>


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

<script>
    // Function to save checkbox state in localStorage
    function saveBookMark(routeId) {
        // Get current state of checkbox
        var isChecked = document.getElementById('checkbox_' + routeId).checked;

        // Save state in localStorage
        localStorage.setItem('bookmark_' + routeId, isChecked);
        
        // Update side panel with bookmarked route information
        if (isChecked) {
            updateSidePanel(routeId);
        } else {
            removeSidePanelItem(routeId);
        }
    }

    // Function to load checkbox state from localStorage
    function loadCheckBoxState(routeId) {
        // Get state from localStorage
        var isChecked = localStorage.getItem('bookmark_' + routeId);

        // Update checkbox state if previously checked
        if (isChecked === 'true') {
            document.getElementById('checkbox_' + routeId).checked = true;
            // Update side panel with bookmarked route information
            updateSidePanel(routeId);
        }
    }

    function updateSidePanel(routeId) {
        // Example of updating side panel with bookmarked route information
        var sidePanelContent = document.getElementById('bookmarkedRoutes');
        var routeInfo = document.createElement('li');
        routeInfo.textContent = 'Route ID: ' + routeId;
        routeInfo.id = 'bookmark_' + routeId; // Set an ID for the bookmarked route
        sidePanelContent.appendChild(routeInfo);
    }

    function removeSidePanelItem(routeId) {
        var sidePanelContent = document.getElementById('bookmarkedRoutes');
        var bookmarkedRoute = document.getElementById('bookmark_' + routeId);
        if (bookmarkedRoute) {
            sidePanelContent.removeChild(bookmarkedRoute);
        }
    }

    // Call loadCheckBoxState for each route when the page loads
    window.onload = function() {
        @foreach($routes as $route)
            loadCheckBoxState({{ $route->id }});
        @endforeach
    };
</script>

