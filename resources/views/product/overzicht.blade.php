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
                    <h6 class="card-title m-t-40"><i class="m-r-5 font-18 mdi mdi-hexagon-multiple"></i> Products</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Productnummer</th>
                                <th scope="col">Productomschrijving</th>
                                <th scope="col">Prijs</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($producten as $product)
                                <tr>
                                    <form method="post" action="/producten/update/{{ $product->productnummer }}">
                                        <th scope="row">{{ $product->productnummer }}</th>
                                        <td><input id="productomschrijving" type="text" class="form-control-plaintext" value="{{ $product->productomschrijving }}" name="productomschrijving"></td>
                                        <td>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="m-r-5 font-16 mdi mdi-currency-eur"></i></span>
                                                </div>
                                                <input id="productprijs" type="text" class="form-control" value="{{ $product->prijs }}" name="prijs">
                                            </div>
                                        </td>
                                        <td><button type="submit" class="btn label label-purple">Edit</button></td>
                                        @csrf
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
                    <form method="post" action="/producten/create">

                        <div class="form-group">
                            <div class="col-sm-8">
                                <button class="btn btn-success">Product toevoegen</button>
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
                $('#productomschrijving').removeClass('form-control').addClass('form-control-plaintext');
            });

            $('#productomschrijving').click(function (event) {
                $('#productomschrijving').removeClass('form-control-plaintext').addClass('form-control');
                event.stopPropagation();
            });
        });

    </script>
@endsection