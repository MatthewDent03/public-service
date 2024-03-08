@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Schedule Information</h1>
        
        @if(isset($data['entity']) && !empty($data['entity']))
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        @foreach($data['entity'] as $entity)
                            <li>
                                <strong>ID: {{ $entity['id'] }}</strong><br>
                                @if(isset($entity['trip_update']))
                                    @if(isset($entity['trip_update']['trip']['trip_id']))
                                        Trip ID: {{ $entity['trip_update']['trip']['trip_id'] }}<br>
                                    @else
                                        Trip ID: N/A<br>
                                    @endif
                                    
                                    Start Time: {{ $entity['trip_update']['trip']['start_time'] ?? 'N/A' }}<br>
                                    Start Date: {{ $entity['trip_update']['trip']['start_date'] ?? 'N/A' }}<br>
                                    Route ID: {{ $entity['trip_update']['trip']['route_id'] ?? 'N/A' }}<br>
                                    Direction ID: {{ $entity['trip_update']['trip']['direction_id'] ?? 'N/A' }}<br>
                                    
                                    @if(isset($entity['trip_update']['stop_time_update']))
                                        <ul>
                                            @foreach($entity['trip_update']['stop_time_update'] as $stop_update)
                                                <li>
                                                    Stop Sequence: {{ $stop_update['stop_sequence'] }}<br>
                                                    
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
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <p>No data available</p>
        @endif
    </div>
@endsection
