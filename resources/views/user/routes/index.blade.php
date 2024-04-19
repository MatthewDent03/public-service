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
        <!-- Bookmarked routes will be dynamically added here -->
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
        
        // Send AJAX request to save bookmark
        // (Same as before)
    }

    // Function to load checkbox state from localStorage
    function loadCheckBoxState(routeId) {
        // Get state from localStorage
        var isChecked = localStorage.getItem('bookmark_' + routeId);

        // Update checkbox state if previously checked
        if (isChecked === 'true') {
            document.getElementById('checkbox_' + routeId).checked = true;
        }
    }

    // Function to open the side panel and populate bookmarked routes
    function openSidePanel() {
        document.getElementById("sidePanel").classList.add('open');
        populateBookmarkedRoutes(); // Populate bookmarked routes
    }

    // Function to toggle the visibility of the side panel
    function toggleSidePanel() {
        var sidePanel = document.getElementById("sidePanel");
        sidePanel.classList.toggle('open');
    }

    // Function to close the side panel
    function closeSidePanel() {
        var sidePanel = document.getElementById("sidePanel");
        sidePanel.classList.remove('open');
    }

    // Function to populate bookmarked routes in the side panel
    function populateBookmarkedRoutes() {
        var bookmarkedRoutesList = document.getElementById('bookmarkedRoutes');
        bookmarkedRoutesList.innerHTML = ''; // Clear previous content

        // Example of adding static routes
        var routes = [
            { id: 1, start_location: "Location A", end_location: "Location B" },
            { id: 2, start_location: "Location C", end_location: "Location D" },
            { id: 3, start_location: "Location E", end_location: "Location F" }
        ];

        routes.forEach(function(route) {
            var li = document.createElement('li');
            li.textContent = route.start_location + ' to ' + route.end_location;
            bookmarkedRoutesList.appendChild(li);
        });

        // Fetch and add bookmarked routes dynamically using AJAX
        // Example:
        // $.ajax({
        //     url: '/fetch-bookmarked-routes',
        //     method: 'GET',
        //     success: function(response) {
        //         response.bookmarkedRoutes.forEach(function(route) {
        //             var li = document.createElement('li');
        //             li.textContent = route.start_location + ' to ' + route.end_location;
        //             bookmarkedRoutesList.appendChild(li);
        //         });
        //     },
        //     error: function(xhr) {
        //     // Handle error response if needed
        //     }
        // });
    }

    // Call loadCheckBoxState for each route when the page loads
    window.onload = function() {
        @foreach($routes as $route)
            loadCheckBoxState({{ $route->id }});
        @endforeach
    };
</script>

