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
                    <h6 class="card-title m-t-40"><i class="m-r-5 font-18 mdi mdi-table"></i> Tafels</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Tafelnummer</th>
                                <th scope="col">Te reserveren via website?</th>
                                <th scope="col">Stoelen</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tafels as $tafel)
                                <tr>
                                    <td>{{ $tafel->tafelnummer }}</td>
                                    <form method="post" action="/tafels/update/{{ $tafel->tafelnummer }}">
                                        @csrf
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" data-status="{{ $tafel->tafelnummer }}" class="status" name="status" value="1" @if ($tafel->status == 1) checked @endif >
                                                <span class="slider roundswitch"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <input id="aantalstoelen" data-stoel="{{ $tafel->tafelnummer }}" type="number" class="form-control-plaintext aantalstoelen" value="{{ $tafel->aantalstoelen }}" name="aantalstoelen">
                                        </td>
                                        <td><button type="submit" data-edit="{{ $tafel->tafelnummer }}" class="btn label label-purple edit-btn edit-pulse-{{ $tafel->tafelnummer }}"><i class="m-r-5 font-14 mdi mdi-pencil"></i></button> <a href="/tafels/delete/{{$tafel->tafelnummer}}" class="btn label label-red" ><i class="m-r-5 font-14 mdi mdi-delete"></i></a></td>
                                    </form>
                                </tr>
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
                    <h4 class="card-title">Tafel toevoegen</h4>
                    <form method="post" action="/tafels/create">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="aantalstoelen">Hoeveel stoelen heeft deze tafel?</label>
                                    <input id="product" type="number" class="form-control{{ $errors->has('productomschrijving') ? ' is-invalid' : '' }}" name="aantalstoelen" required autofocus>
                                </div>

                                @if ($errors->has('productomschrijving'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productomschrijving') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8">
                                <div class="input-group mb-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Is deze tafel reserveerbaar vanaf de website?</label>
                                        <label class="switch">
                                            <input type="checkbox"  class="status" name="status" value="1" checked>
                                            <span class="slider roundswitch"></span>
                                        </label>
                                    </div>
                                </div>
                                @if ($errors->has('status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8">
                                <button class="btn btn-success">Tafel toevoegen</button>
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
        $( document ).ready(function() {
            $(document).click(function() {
                $('.aantalstoelen').removeClass('form-control').addClass('form-control-plaintext');
            });

            $('.aantalstoelen').click(function (event) {
                $('.aantalstoelen').removeClass('form-control-plaintext').addClass('form-control');
                event.stopPropagation();
            });

            $(".aantalstoelen").on("input", function() {
                var a = $(this).data('stoel');
                $('.edit-pulse-' + a).addClass('pulse-button');
            });

            $('.status').change(function (event) {
                var a = $(this).data('status');
                $('.edit-pulse-' + a).addClass('pulse-button');
            });
        });

    </script>
@endsection