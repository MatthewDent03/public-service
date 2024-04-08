@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ __('Edit Private Company') }}</div>

                <div class="card-body">
                @if(session('error'))
                        <div class="alert alert-error">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('private_companies.update', $privateCompany->id) }}">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="company_name" class="form-label">{{ __('Company Name') }}</label>
                            <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name', $privateCompany->company_name) }}" required autofocus>
                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="company_email" class="form-label">{{ __('Company Email') }}</label>
                            <textarea id="company_email" class="form-control @error('company_email') is-invalid @enderror" name="company_email" rows="5" required>{{ old('company_email', $privateCompany->company_email) }}</textarea>
                            @error('company_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="company_number" class="form-label">{{ __('Company number') }}</label>
                            <textarea id="company_number" class="form-control @error('company_number') is-invalid @enderror" name="company_number" rows="5" required>{{ old('company_number', $privateCompany->company_number) }}</textarea>
                            @error('company_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Add fields for other attributes -->

                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
