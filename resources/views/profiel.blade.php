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
                        <table class="table col-12">
                            <tbody>
                            <tr>
                                <td class="text-muted">Klantnummer:</td>
                                <td class="font-medium">{{$user->klantnummer}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Email:</td>
                                <td class="font-medium">{{$user->email}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Voorletter/Achternaam:</td>
                                <td class="font-medium">{{$user->voorletter}}</td>
                                <td class="font-medium">{{$user->voorvoegsel}}</td>
                                <td class="font-medium">{{$user->achternaam}}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Telefoon:</td>
                                <td class="font-medium">{{$user->telefoon}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Adres:</td>
                                <td class="font-medium">{{$user->adres}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Postcode</td>
                                <td class="font-medium">{{$user->postcode}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Plaats:</td>
                                <td class="font-medium">{{$user->plaats}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="font-medium"></td>
                                <td><input class="btn btn-info text-white" type="submit" value="Gegevens aanpassen"/></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
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