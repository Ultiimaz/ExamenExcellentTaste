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
                        <table>
                            <tr>
                                <th>Klantnummer:</th>
                                <th>Email:</th>
                                <th>Voorletter:</th>
                                <th>Voorvoegsel:</th>
                                <th>Achternaam:</th>
                            </tr>
                            <tr>
                                <td>{{$user->klantnummer}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->voorletter}}</td>
                                <td>{{$user->voorvoegsel}}</td>
                                <td>{{$user->achternaam}}</td>
                            </tr>
                        </table>

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