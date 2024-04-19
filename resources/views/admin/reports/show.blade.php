@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Report Id :  {{ $report->id }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>Title:</strong> {{ $report->title }}
                    </div>
                    <div class="mb-3">
                        <strong>Description:</strong> {{ $report->description }}
                    </div>
                    <!-- Add any additional fields you want to display -->
                    <div class="mb-3">
                        <strong>nearest_stop:</strong> {{ $report->nearest_stop }}
                    </div>

                    <div class="mb-3">
                        <strong>city:</strong> {{ $report->city }}
                    </div>

                    <div class="mb-3">
                        <strong>incident_date:</strong> {{ $report->incident_date }}
                    </div>
                    <!-- Back Button -->
                    <a href="{{ route('admin.reports.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
