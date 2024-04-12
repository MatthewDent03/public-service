@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit route') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dev.routes.update', $route->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="start_location" class="form-label">{{ __('Start Location') }}</label>
                            <input id="start_location" type="text" class="form-control @error('start_location') is-invalid @enderror" name="start_location" value="{{ old('start_location', $route->start_location) }}" required autofocus>
                            @error('start_location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="end_location" class="form-label">{{ __('End Location') }}</label>
                            <textarea id="end_location" class="form-control @error('end_location') is-invalid @enderror" name="end_location" rows="5" required>{{ old('end_location', $route->end_location) }}</textarea>
                            @error('end_location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="estimated_departure" class="form-label">{{ __('Estimated Departure') }}</label>
                            <input id="estimated_departure" type="text" class="form-control @error('estimated_departure') is-invalid @enderror" name="estimated_departure" value="{{ old('estimated_departure', $route->estimated_departure) }}" required autofocus>
                            @error('estimated_departure')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="estimated_arrival" class="form-label">{{ __('Estimated Arrival') }}</label>
                            <textarea id="estimated_arrival" class="form-control @error('estimated_arrival') is-invalid @enderror" name="estimated_arrival" rows="5" required>{{ old('estimated_arrival', $route->estimated_arrival) }}</textarea>
                            @error('estimated_arrival')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="journey_route" class="form-label">{{ __('Journey Route') }}</label>
                            <input id="journey_route" type="text" class="form-control @error('journey_route') is-invalid @enderror" name="journey_route" value="{{ old('journey_route', $route->journey_route) }}" required autofocus>
                            @error('journey_route')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            <a href="{{ route('dev.routes.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
