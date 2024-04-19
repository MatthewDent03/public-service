@extends('layouts.app')
<!-- creating a blade file importing layouts.app and initiating a section, these hold cards that contain the stops fields which are form inputs for users to fill in, there are actions and buttons 
added to include linkage to the stops controller functionality for CRUD, errors and old methods were added to the input form fields, these routes also specify the role of the user to route correctly -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Stop') }}</div>

                <div class="card-body">
                @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('dev.stops.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="location_name" class="form-label">{{ __('Location Name') }}</label>
                            <input id="location_name" type="text" class="form-control @error('location_name') is-invalid @enderror" name="location_name" value="{{ old('location_name') }}" required autofocus>
                            @error('location_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="number" class="form-label">{{ __('Number') }}</label>
                            <textarea id="number" class="form-control @error('number') is-invalid @enderror" name="number" rows="5" required>{{ old('number') }}</textarea>
                            @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="estimated_arrival_time" class="form-label">{{ __('Estimated Arrival Time') }}</label>
                            <textarea id="estimated_arrival_time" class="form-control @error('estimated_arrival_time') is-invalid @enderror" name="estimated_arrival_time" rows="5" required>{{ old('estimated_arrival_time') }}</textarea>
                            @error('estimated_arrival_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            <a href="{{ route('dev.stops.index') }}" class="btn btn-primary">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
