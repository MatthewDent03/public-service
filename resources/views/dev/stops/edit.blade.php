@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit route') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dev.stops.update', $route->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="location_name" class="form-label">{{ __('Location Names') }}</label>
                            <input id="location_name" type="text" class="form-control @error('location_name') is-invalid @enderror" name="location_name" value="{{ old('location_name', $route->location_name) }}" required autofocus>
                            @error('location_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Number" class="form-label">{{ __('Number') }}</label>
                            <textarea id="Number" class="form-control @error('Number') is-invalid @enderror" name="Number" rows="5" required>{{ old('Number', $route->Number) }}</textarea>
                            @error('Number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="estimated_arrival_time" class="form-label">{{ __('Estimated Arrival Time') }}</label>
                            <input id="estimated_arrival_time" type="text" class="form-control @error('estimated_arrival_time') is-invalid @enderror" name="estimated_arrival_time" value="{{ old('estimated_arrival_time', $route->estimated_arrival_time) }}" required autofocus>
                            @error('estimated_arrival_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            <a href="{{ route('dev.stops.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
