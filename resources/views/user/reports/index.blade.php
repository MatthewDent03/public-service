@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
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
