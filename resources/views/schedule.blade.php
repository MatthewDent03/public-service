@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5 mb-4">Schedule Information</h1>
        
        @if(isset($data['entity']) && !empty($data['entity']))
            <div class="row">
                @foreach($data['entity'] as $entity)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ID: {{ $entity['id'] }}</h5>
                                @if(isset($entity['trip_update']))
                                    <p>
                                        Start Time: {{ $entity['trip_update']['trip']['start_time'] ?? 'N/A' }}<br>
                                        Start Date: {{ $entity['trip_update']['trip']['start_date'] ?? 'N/A' }}<br>
                                        Route ID: {{ $entity['trip_update']['trip']['route_id'] ?? 'N/A' }}<br>                                        
                                    </p>
                                    
                                    <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Trip Update Data
                                        </button>
                                        <div class="dropdown-menu">
                                            @if(isset($entity['trip_update']['stop_time_update']))
                                                @foreach($entity['trip_update']['stop_time_update'] as $stop_update)
                                                    <a class="dropdown-item" href="#">
                                                        @if(isset($stop_update['arrival']['delay']))
                                                            Arrival Delay: {{ $stop_update['arrival']['delay'] }}
                                                        @else
                                                            Arrival Delay: N/A
                                                        @endif
                                                        <br>
                                                        Stop ID: {{ $stop_update['stop_id'] }}
                                                    </a>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No data available</p>
        @endif
    </div>
@endsection
