@extends('layouts.app')

@section('content')
    <div class="container mx-5">
        <div class="row justify-content-center">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @if(isset($data['entity']) && !empty($data['entity']))
                        @foreach($data['entity'] as $key => $entity)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">ID: {{ $entity['id'] }}</h5>
                                                @if(isset($entity['trip_update']))
                                                    <p class="card-text">
                                                        Start Time: {{ $entity['trip_update']['trip']['start_time'] ?? 'N/A' }}<br>
                                                        Start Date: {{ $entity['trip_update']['trip']['start_date'] ?? 'N/A' }}<br>
                                                        Route ID: {{ $entity['trip_update']['trip']['route_id'] ?? 'N/A' }}<br>
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
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="carousel-item active">
                            <p>No data available</p>
                        </div>
                    @endif
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
@endsection
