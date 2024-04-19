@extends('layouts.app')
<!-- creating a blade file importing layouts.app and initiating a section, these hold cards that contain the routes fields which are form inputs for users to fill in, there are actions and buttons 
added to include linkage to the routes controller functionality for CRUD, errors and old methods were added to the input form fields, these routes also specify the role of the user to route correctly -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Route') }}</div>

                <div class="card-body">
                @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('dev.routes.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="start_location" class="form-label">{{ __('Start Location') }}</label>
                            <input id="start_location" type="text" class="form-control @error('start_location') is-invalid @enderror" name="start_location" value="{{ old('start_location') }}" required autofocus>
                            @error('start_location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="end_location" class="form-label">{{ __('End Location') }}</label>
                            <textarea id="end_location" class="form-control @error('end_location') is-invalid @enderror" name="end_location" rows="5" required>{{ old('end_location') }}</textarea>
                            @error('end_location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="estimated_departure" class="form-label">{{ __('Estimated Departure') }}</label>
                            <textarea id="estimated_departure" class="form-control @error('estimated_departure') is-invalid @enderror" name="estimated_departure" rows="5" required>{{ old('estimated_departure') }}</textarea>
                            @error('estimated_departure')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="estimated_arrival" class="form-label">{{ __('Estimated Arrival') }}</label>
                            <textarea id="estimated_arrival" class="form-control @error('estimated_arrival') is-invalid @enderror" name="estimated_arrival" rows="5" required>{{ old('estimated_arrival') }}</textarea>
                            @error('estimated_arrival')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="journey_route" class="form-label">{{ __('journey_route') }}</label>
                            <textarea id="journey_route" class="form-control @error('journey_route') is-invalid @enderror" name="journey_route" rows="5" required>{{ old('journey_route') }}</textarea>
                            @error('journey_route')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <label for="private_company_id" class="form-label">{{ __('Private Company') }}</label>
                            <select id="private_company_id" class="form-select @error('private_company_id') is-invalid @enderror" name="private_company_id" required>
                                <option value="">Select Private Company</option>
                                @foreach($privateCompanies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_number }} - {{ $company->company_name }}</option>
                                @endforeach
                            </select>
                            @error('private_company_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            <a href="{{ route('dev.routes.index') }}" class="btn btn-primary">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
