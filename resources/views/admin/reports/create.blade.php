@extends('layouts.app')
<!-- creating a blade file importing layouts.app and initiating a section, these hold cards that contain the reports fields which are form inputs for users to fill in, there are actions and buttons 
added to include linkage to the reports controller functionality for CRUD, errors and old methods were added to the input form fields, these routes also specify the role of the user to route correctly -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Report') }}</div>

                <div class="card-body">
                @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.reports.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">{{ __('Title') }}</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">{{ __('Description') }}</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="5" required>{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nearest_stop" class="form-label">{{ __('nearest_stop') }}</label>
                            <textarea id="nearest_stop" class="form-control @error('nearest_stop') is-invalid @enderror" name="nearest_stop" rows="5" required>{{ old('nearest_stop') }}</textarea>
                            @error('nearest_stop')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label">{{ __('city') }}</label>
                            <textarea id="city" class="form-control @error('city') is-invalid @enderror" name="city" rows="5" required>{{ old('city') }}</textarea>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="incident_date" class="form-label">{{ __('incident_date') }}</label>
                            <textarea id="incident_date" class="form-control @error('incident_date') is-invalid @enderror" name="incident_date" rows="5" required>{{ old('incident_date') }}</textarea>
                            @error('incident_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            <a href="{{ route('admin.reports.index') }}" class="btn btn-primary">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
