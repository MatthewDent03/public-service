@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <h1 class="text-center mb-4 text-dark">All Private Companies</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Company Email</th>
                        <th scope="col">Company Number</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($privateCompanies as $private_company)

                        <tr>
                        <th scope="row">{{ $private_company->id }}</th>
                        <td>{{ $private_company->company_name }}</td>
                        <td>{{ $private_company->company_email }}</td>
                        <td>{{ $private_company->company_number }}</td>
                        <td>
                            
                            <a href="{{ route('private_companies.show', $private_company->id) }}" class="btn btn-primary btn-sm">{{ __('View') }}</a>
                            <a href="{{ route('private_companies.edit', $private_company->id) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                            <!-- Add Delete Button with Form -->
                            @if(session('error'))
                                <div class="alert alert-error">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="{{ route('private_companies.destroy', $private_company->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to delete this company?')">{{ __('Delete') }}</button>
                            </form>
                        </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">{{ __('No private_companies found.') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- Pagination Links -->
                {{ $privateCompanies->links() }}

            </div>
        </div>
    </div>
</div>
@endsection
