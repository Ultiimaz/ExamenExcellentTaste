@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Addres') }}</label>

                            <div class="col-md-6">
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

                            <div class="col-md-6">
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

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="achternaam" class="col-md-4 col-form-label text-md-right">{{ __('Volledige naam') }}</label>

                            <div class="col-md-6 col-sm-offset-4">
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

                            <div class="col-md-6">
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

                            <div class="col-md-6">
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

                            <div class="col-md-6">
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

                            <div class="col-md-6">
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

                        <div class="form-group row ">
                            <label class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                {!! Captcha::display() !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
