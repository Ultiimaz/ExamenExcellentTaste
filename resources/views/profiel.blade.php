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
                                <td colspan="2"> {{$user->email}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Voorletter/Achternaam:</td>
                                <td>
                                <div class="input-group">
                                <input maxlength="1" name="voorletter" id="Gegevens" type="text" class="small-input form-control" value="{{$user->voorletter}}"/>
                                <input name="voorvoegsel" id="Gegevens" type="text" class="form-control" value="{{$user->voorvoegsel}}"/>
                                <input name="achternaam" id="Gegevens" type="text" class="form-control" value="{{$user->achternaam}}"/>
                                </div>
                                </td>
                                <td></td>
                                <td></td>
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
                    <h4 class="card-title">Wachtwoord wijzigen</h4>
                    @if (session('password'))
                        <div class="alert alert-success" role="alert">
                            {{ session('password') }}
                        </div>
                    @endif
                    <form method="post" action="/profiel/wachtwoordveranderen/{{ $user->klantnummer }}">
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Huidige wachtwoord') }}</label>

                            <div class="col-md-8">
                                <input id="passowrd" type="password" class="form-control{{ $errors->has('currentpassword') ? ' is-invalid' : '' }}" name="currentpassword"required>

                                @if ($errors->has('currentpassword'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('currentpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nieuw Wachtwoord') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                <p id="passwordHelpBlock" class="form-text text-muted">
                                    Uw wachtwoord moet langer zijn dan 8 tekens, moet ten minste 1 hoofdletter, 1 kleine letter, 1 numeriek teken en 1 speciaal teken bevatten.
                                </p>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord bevestigen') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-8">
                                {!! Captcha::display() !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-success">Wachtwoord wijzigen</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bekijk hier uw facturen</h4>
                    <a href="/nota" class="btn btn-block btn-danger text-white">Notas bekijken</a>
                </div>
            </div>
        </div>
    </div>



@endsection
