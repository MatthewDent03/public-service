@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">nearest_stop</th>
                        <th scope="col">city</th>
                        <th scope="col">incident_date</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($reports as $report)
                        <tr>
                        <th scope="row">{{ $report->id }}</th>
                        <td>{{ $report->title }}</td>
                        <td>{{ $report->description }}</td>
                        <td>{{ $report->nearest_stop }}</td>
                        <td>{{ $report->city }}</td>
                        <td>{{ $report->incident_date }}</td>
                        <td>
                            <a href="{{ route('admin.reports.show', $report->id) }}" class="btn btn-primary btn-sm">{{ __('View') }}</a>
                            <a href="{{ route('admin.reports.edit', $report->id) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                            <!-- Add Delete Button with Form -->
                            <form action="{{ route('admin.reports.destroy', $report->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to delete this report?')">{{ __('Delete') }}</button>
                            </form>
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
@endsection
