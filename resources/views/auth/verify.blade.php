@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifier uw email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Er is een mail naar uw mail adres gestuurd.') }}
                        </div>
                    @endif

                    {{ __('Voordat u doorgaat, kijk uw mail of er niet al een mail is.') }}
                    {{ __('Als u niet de mail heeft ontvangen') }}, <a href="{{ route('verification.resend') }}">{{ __('klik hier om nog een verificatiemail te ontvangen') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
