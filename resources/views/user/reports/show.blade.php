@extends('layouts.app')
<!-- Creating a card that displays the fields according to the id of the reports and has linkage and redirects to the other pages of this topic, they are stored in card divs along with titles-->

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

                    <!-- Back Button -->
                    <a href="{{ route('user.reports.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
