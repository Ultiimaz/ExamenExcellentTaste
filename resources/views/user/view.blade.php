@extends('layouts.dashboard')

@section('page')
    <div class="row">
        <div class="col-md-6">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h3 class="card-title">Profiel gegevens van klant {{ $user->klantnummer }}</h3>
                        </div>
                    </div>
                    @if($user->status == 0)
                        <div class="alert alert-danger" role="alert">
                            Deze gebruiker is geblokkeerd!
                        </div>
                    @endif
                    <div class="row">
                        <form method="post" action="/gebruikers/update/{{ $user->klantnummer }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Klantnummer') }}</label>

                                <div class="col">
                                    <input type="text" class="form-control" value="{{ $user->klantnummer }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col">
                                    <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="achternaam" class="col-md-4 col-form-label text-md-right">{{ __('Volledige naam') }}</label>

                                <div class="col col-sm-offset-4">
                                    <div class="input-group">
                                        <input id="voorletter" maxlength="1" type="text" class="small-input form-control{{ $errors->has('voorletter') ? ' is-invalid' : '' }}" name="voorletter" value="{{ $user->voorletter }}" required>
                                        <input id="voorvoegsel" type="text" class="form-control{{ $errors->has('voorvoegsel') ? ' is-invalid' : '' }}" name="voorvoegsel" value="{{ $user->voorvoegsel }}">
                                        <input id="achternaam" type="text" class="form-control{{ $errors->has('achternaam') ? ' is-invalid' : '' }}" name="achternaam" value="{{ $user->achternaam }}" required>
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

                                <div class="col">
                                    <input id="adres" type="text" class="form-control{{ $errors->has('adres') ? ' is-invalid' : '' }}" name="adres" value="{{ $user->adres }}" required>

                                    @if ($errors->has('adres'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('adres') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="postcode" class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>

                                <div class="col">
                                    <input id="postcode" type="text" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ $user->postcode }}" required>

                                    @if ($errors->has('postcode'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="plaats" class="col-md-4 col-form-label text-md-right">{{ __('Plaats') }}</label>

                                <div class="col">
                                    <input id="plaats" type="text" class="form-control{{ $errors->has('plaats') ? ' is-invalid' : '' }}" name="plaats" value="{{ $user->plaats }}" required>

                                    @if ($errors->has('plaats'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('plaats') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telefoon" class="col-md-4 col-form-label text-md-right">{{ __('Telefoon') }}</label>

                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input id="telefoon" type="tel" class="form-control{{ $errors->has('telefoon') ? ' is-invalid' : '' }}" name="telefoon" value="{{ $user->telefoon }}" required>
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

                                <div class="col submit-btn invisible">
                                    {!! Captcha::display() !!}
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col offset-md-4">
                                    <button type="submit" class="btn btn-primary submit-btn invisible">
                                        {{ __('Aanpassen') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- column -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <a href="/gebruikers/delete/{{ $user->klantnummer }}" class="btn btn-block btn-danger"><span class="mdi mdi-delete"></span> Verwijderen</a>
                    @if($user->status == 0) <a href="/gebruikers/unblock/{{ $user->klantnummer }}" class="btn btn-block btn-success"><span class="mdi mdi-lock-open"></span> Deblokkeren</a> @else <a href="/gebruikers/block/{{ $user->klantnummer }}" class="btn btn-block btn-dark"><span class="mdi mdi-lock"></span> Blokkeren</a> @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $( document ).ready(function() {
            $("input").on("input", function() {
                $('.submit-btn').removeClass('invisible');
            });
        });

    </script>
@endsection