@extends('layouts.dashboard')

@section('page')
    <div class="row">
        <div class="col-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title m-t-40"><i class="m-r-5 font-18 mdi mdi-group"></i> Gebruikers</h6>
                    <div class="col-3">
                        <input id="user-filter" class="form-control" type="text" placeholder="Zoek.."><br>
                    </div>
                    <div class="table-responsive">
                        <table id="user-table" class="table">
                            <thead>
                            <tr>
                                <th scope="col">Klantnummer</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rol</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                @if($user->status == 0 || $user->status == 1 || $user->status == 2)
                                <tr>
                                    <td scope="row"><a href="/gebruikers/{{ $user->klantnummer }}">{{ $user->klantnummer }}</a></td>
                                    <td scope="row">{{ $user->email }}</td>
                                    <td scope="row">@if($user->status == 2) <p class="text-danger">Beheerder</p> @elseif($user->status == 1) Klant @elseif($user->status == 0) <p class="text-muted">Geblokkeerd</p> @endif</td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Gebruiker toevoegen</h4>
                    <form method="post" action="/gebruikers/create">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Addres') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord') }}</label>

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

                        <hr>

                        <div class="form-group row">
                            <label for="achternaam" class="col-md-4 col-form-label text-md-right">{{ __('Volledige naam') }}</label>

                            <div class="col-md-8 col-sm-offset-4">
                                <div class="input-group">
                                    <input id="voorletter" maxlength="1" type="text" class="small-input form-control{{ $errors->has('voorletter') ? ' is-invalid' : '' }}" name="voorletter" value="{{ old('voorletter') }}" required>
                                    <input id="voorvoegsel" type="text" class="form-control{{ $errors->has('voorvoegsel') ? ' is-invalid' : '' }}" name="voorvoegsel" value="{{ old('voorvoegsel') }}">
                                    <input id="achternaam" type="text" class="form-control{{ $errors->has('achternaam') ? ' is-invalid' : '' }}" name="achternaam" value="{{ old('achternaam') }}" required>
                                </div>
                                @if ($errors->has('achternaam', 'voorvoegsel', 'voorletter'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('achternaam', 'voorvoegsel', 'voorletter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="adres" class="col-md-4 col-form-label text-md-right">{{ __('Adres') }}</label>

                            <div class="col-md-8">
                                <input id="adres" type="text" class="form-control{{ $errors->has('adres') ? ' is-invalid' : '' }}" name="adres" value="{{ old('adres') }}" required>

                                @if ($errors->has('adres'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('adres') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postcode" class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>

                            <div class="col-md-8">
                                <input id="postcode" type="text" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ old('postcode') }}" required>

                                @if ($errors->has('postcode'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="plaats" class="col-md-4 col-form-label text-md-right">{{ __('Plaats') }}</label>

                            <div class="col-md-8">
                                <input id="plaats" type="text" class="form-control{{ $errors->has('plaats') ? ' is-invalid' : '' }}" name="plaats" value="{{ old('plaats') }}" required>

                                @if ($errors->has('plaats'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('plaats') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefoon" class="col-md-4 col-form-label text-md-right">{{ __('Telefoon') }}</label>

                            <div class="col-md-8">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">06 -</span>
                                    </div>
                                    <input id="telefoon" maxlength="8" type="tel" class="form-control{{ $errors->has('telefoon') ? ' is-invalid' : '' }}" name="telefoon" value="{{ old('telefoon') }}" required>
                                </div>
                                @if ($errors->has('telefoon'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefoon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Beheerder?') }}</label>

                            <div class="col-md-8">
                                <div class="form-check">
                                    <input name="status" id="status" class="form-check-input" type="radio" value="2">
                                </div>
                            </div>
                            @if ($errors->has('status'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group row ">

                            <div class="col-md-8">
                                {!! Captcha::display() !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Toevoegen') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#user-filter").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#user-table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection