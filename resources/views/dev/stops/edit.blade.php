@extends('layouts.app')
<!-- this code imports and extends layouts to create a form for editing previously created stops, their old values are displayed in the fields and can be edited, there are routing buttons and linkage
to the CRUD functionality, it specifies the role of the user to avoid incorrect redirection -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit stop') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dev.stops.update', $stop->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="location_name" class="form-label">{{ __('Location Names') }}</label>
                            <input id="location_name" type="text" class="form-control @error('location_name') is-invalid @enderror" name="location_name" value="{{ old('location_name', $stop->location_name) }}" required autofocus>
                            @error('location_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="number" class="form-label">{{ __('Number') }}</label>
                            <textarea id="number" class="form-control @error('number') is-invalid @enderror" name="number" rows="5" required>{{ old('number', $stop->number) }}</textarea>
                            @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="estimated_arrival_time" class="form-label">{{ __('Estimated Arrival Time') }}</label>
                            <input id="estimated_arrival_time" type="text" class="form-control @error('estimated_arrival_time') is-invalid @enderror" name="estimated_arrival_time" value="{{ old('estimated_arrival_time', $stop->estimated_arrival_time) }}" required autofocus>
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
