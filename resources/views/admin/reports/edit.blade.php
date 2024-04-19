@extends('layouts.app')
<!-- this code imports and extends layouts to create a form for editing previously created reports, their old values are displayed in the fields and can be edited, there are routing buttons and linkage
to the CRUD functionality, it specifies the role of the user to avoid incorrect redirection -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Report') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.reports.update', $report->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">{{ __('Title') }}</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $report->title) }}" required autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">{{ __('Description') }}</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="5" required>{{ old('description', $report->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nearest_stop" class="form-label">{{ __('nearest_stop') }}</label>
                            <input id="nearest_stop" type="text" class="form-control @error('nearest_stop') is-invalid @enderror" name="nearest_stop" value="{{ old('nearest_stop', $report->nearest_stop) }}" required autofocus>
                            @error('nearest_stop')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label">{{ __('city') }}</label>
                            <textarea id="city" class="form-control @error('city') is-invalid @enderror" name="city" rows="5" required>{{ old('city', $report->city) }}</textarea>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="incident_date" class="form-label">{{ __('incident_date') }}</label>
                            <input id="incident_date" type="text" class="form-control @error('incident_date') is-invalid @enderror" name="incident_date" value="{{ old('incident_date', $report->incident_date) }}" required autofocus>
                            @error('incident_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
