@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Private Company Details') }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>company_name:</strong> {{ $privateCompany->company_name }}
                    </div>
                    <div class="mb-3">
                        <strong>company_email:</strong> {{ $privateCompany->company_email }}
                    </div>
                    <!-- Add any additional fields you want to display -->
                    <div class="mb-3">
                        <strong>company_number:</strong> {{ $privateCompany->company_number }}
                    </div>
                    <!-- Back Button -->
                    <a href="{{ route('private_companies.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
