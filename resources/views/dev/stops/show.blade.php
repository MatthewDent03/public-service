@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Stop Details') }}</div>
                <div class="card-body">
                <div class="mb-3">
                    <strong>Location Name:</strong> {{ $stop->location_name }}
                </div>
                <div class="mb-3">
                    <strong>Number:</strong> {{ $stop->number }}
                </div>
                <div class="mb-3">
                    <strong>Estimated Arrival Time:</strong> {{ $stop->estimated_arrival_time }}
                </div>

                    <!-- Back Button -->
                    <a href="{{ route('dev.stops.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
