@extends('layouts.app')
<!-- this displays all the reports that have been submitted on a page that has pagination to allow for organised page layout, they are displayed in a table and contain routing and linkage
to allow users to be redirected correctly and access content according to their role type -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <h1 class="text-center mb-4 text-dark">All User Reports</h1>
            <div class="table">
                <div class="card-header">{{ __('All Reports') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reports as $report)
                            <tr>
                                <th scope="row">{{ $report->id }}</th>
                                <td>{{ $report->title }}</td>
                                <td>{{ $report->description }}</td>
                                <td>
                                    <a href="{{ route('user.reports.show', $report->id) }}" class="btn btn-primary btn-sm">{{ __('View') }}</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">{{ __('No reports found.') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Pagination Links -->
                    {{ $reports->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


