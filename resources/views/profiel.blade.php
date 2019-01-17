@extends('layouts.dashboard')

@section('page')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h3 class="card-title">Profiel gegevens</h3>
                        </div>
                    </div>
                    <div class="row">
                        <!-- column -->
                        {{--@foreach($klantgegevens as $key => $data)--}}
                            {{--<tr>--}}
                                {{--<th>{{$data->klantnummer}}</th>--}}
                                {{--<th>{{$data->email}}</th>--}}
                                {{--<th>{{$data->voorletter}}</th>--}}
                                {{--<th>{{$data->voorvoegsel}}</th>--}}
                                {{--<th>{{$data->achternaam}}</th>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}


                        <!-- column -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">komt nog iets(facturen?)</h4>
                    <div class="feed-widget">


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection