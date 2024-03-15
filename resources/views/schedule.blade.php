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
                                    <p class="card-text">
                                        Start Time: {{ $entity['trip_update']['trip']['start_time'] ?? 'N/A' }}<br>
                                        Start Date: {{ $entity['trip_update']['trip']['start_date'] ?? 'N/A' }}<br>
                                        Route ID: {{ $entity['trip_update']['trip']['route_id'] ?? 'N/A' }}<br>
                                        Route Name: {{ $entity['routes']['route']['route_short_name'] ?? 'N/A'}}<br>
                                        
                                    </p>
                                    
                                    @if(isset($entity['trip_update']['stop_time_update']))
                                        <ul class="list-group">
                                            @foreach($entity['trip_update']['stop_time_update'] as $stop_update)
                                                <li class="list-group-item bg-primary text-white">
                                                    @if(isset($stop_update['arrival']['delay']))
                                                        Arrival Delay: {{ $stop_update['arrival']['delay'] }}<br>
                                                    @else
                                                        Arrival Delay: N/A<br>
                                                    @endif
                                                    Stop ID: {{ $stop_update['stop_id'] }}<br>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
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
