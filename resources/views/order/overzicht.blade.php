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
                    <div class="col-3">
                        <input id="product-filter" class="form-control" type="text" placeholder="Zoek.."><br>
                    </div>
                    <div class="table-responsive">
                        <table id="product-table" class="table">
                            <thead>
                            <tr>
                                <th scope="col">Klantnummer</th>
                                <th scope="col">Reserveernummer</th>
                                <th scope="col">Prijs</th>
                                <th scope="col">Categorie</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $orders as $order)
                                <tr>
                                    <td>{{$order->reserveernummer}}</td>

                                    <td>{{$order->orderpick()->first()->klantnummer}}</td>
                                    <td>{{$order->productnummer}}</td>
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
                    <h4 class="card-title">Product toevoegen</h4>
                    <form method="post" action="/producten/create">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-8">
                                <select class="form-control" name="productnummer" id="productnummer">
                                    @if($producten->count() > 0)
                                        @foreach($producten as $product)
                                            <option value="{{$product->productnummer}}">{{$product->productomschrijving}}</option>
                                        @endForeach
                                    @else
                                        Geen producten gevonden
                                    @endif
                                </select>
                                {{--<td><input id="aantalbe" data-product="{{ $product->productnummer }}" type="text" class="form-control-plaintext product " value="{{ $product->productomschrijving }}" name="productomschrijving"></td>--}}

                                @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8">
                                <select class="form-control" name="productnummer" id="productnummer">
                                    @if($reservering->count() > 0)
                                        @foreach($producten as $product)
                                            <option value="{{$product->productnummer}}">{{$product->productomschrijving}}</option>
                                        @endForeach
                                    @else
                                        Geen producten gevonden
                                    @endif
                                </select>
                                {{--<td><input id="aantalbe" data-product="{{ $product->productnummer }}" type="text" class="form-control-plaintext product " value="{{ $product->productomschrijving }}" name="productomschrijving"></td>--}}

                                @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8">
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

            $(".product").on("input", function() {
                var a = $(this).data('product');
                $('.edit-pulse-' + a).addClass('pulse-button');
            });

            $("#product-filter").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#product-table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#category-filter").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#category-table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>
@endsection
