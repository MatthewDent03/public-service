@extends('layouts.app')

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
                    <a href="#" class="btn btn-primary">View Reports</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Private Transportation</h5>
                    <p class="card-text">Get access to our transportation services provided via private companies.</p>
                    <a href="#" class="btn btn-primary">View Private Schedules</a>
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
