@extends('layouts.dashboard')

@section('page')
    <div class="row">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h3 class="card-title">Profiel gegevens</h3>
                        </div>
                    </div>
                    <div class="row">
                        <form method="post" action="/profiel/update/{{ $user->klantnummer }}">
                        <table class="table col-12">
                            <tbody>
                            <tr>

                                <td class="text-muted">Klantnummer:</td>
                                <td>{{$user->klantnummer}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Email:</td>
                                <td colspan="2"> <input  id="Gegevens" type="text" class="form-control-plaintext" value="{{$user->email}}"/></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Voorletter/Achternaam:</td>
                                <td ><input maxlength="1" name="voorletter" id="Gegevens" type="text" class="form-control" value="{{$user->voorletter}}"/></td>
                                <td ><input name="voorvoegsel" id="Gegevens" type="text" class="form-control" value="{{$user->voorvoegsel}}"/></td>
                                <td ><input name="achternaam" id="Gegevens" type="text" class="form-control" value="{{$user->achternaam}}"/></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Telefoon:</td>
                                <td><input name="telefoon" id="Gegevens" type="text" class="form-control" value="{{$user->telefoon}}"/></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Adres:</td>
                                <td> <input name="adres" id="Gegevens" type="text" class="form-control" value="{{$user->adres}}"/></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Postcode</td>
                                <td> <input name="postcode" id="Gegevens" type="text" class="form-control" value="{{$user->postcode}}"/></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Plaats:</td>
                                <td> <input name="plaats" id="Gegevens" type="text" class="form-control" value="{{$user->plaats}}"/></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="font-medium"></td>
                                <td><input class="btn btn-purple text-white" type="submit" value="Gegevens aanpassen"/></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                            @csrf
                        </form>

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
