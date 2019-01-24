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
                                <th scope="col">Productnummer</th>
                                <th scope="col">Productomschrijving</th>
                                <th scope="col">Prijs</th>
                                <th scope="col">Categorie</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($producten as $product)
                            <tr>
                                <form method="post" action="/producten/update/{{ $product->productnummer }}">
                                    @csrf
                                    <th scope="row">{{ $product->productnummer }}</th>
                                    <td><input id="productomschrijving" data-product="{{ $product->productnummer }}" type="text" class="form-control-plaintext product " value="{{ $product->productomschrijving }}" name="productomschrijving"></td>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="m-r-5 font-16 mdi mdi-currency-eur"></i></span>
                                            </div>
                                            <input id="productprijs" data-product="{{ $product->productnummer }}" type="text" class="form-control product" value="{{ $product->prijs }}" name="prijs">
                                        </div>
                                    </td>
                                    <td scope="row">{{ $product->category()[0]->category_name }}</td>
                                    <td><button type="submit" class="btn label label-purple edit-pulse-{{ $product->productnummer }}"><i class="m-r-5 font-14 mdi mdi-pencil"></i></button> <a href="/producten/delete/{{$product->productnummer}}" class="btn label label-red" ><i class="m-r-5 font-14 mdi mdi-delete"></i></a></td>
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
                    <h4 class="card-title">Product toevoegen</h4>
                    <form method="post" action="/producten/create">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-8">
                                <input id="product" type="text" class="form-control{{ $errors->has('productomschrijving') ? ' is-invalid' : '' }}" name="productomschrijving" required autofocus placeholder="Productnaam">

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
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="m-r-5 font-16 mdi mdi-currency-eur"></i></span>
                                    </div>
                                    <input id="prijs" type="text" class="form-control" name="prijs" placeholder="Prijs">
                                </div>
                                @if ($errors->has('prijs'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prijs') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8">
                                <select class="form-control" name="category" id="category">
                                    @if($categories->count() > 0)
                                        @foreach($categories as $category)
                                            <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @endForeach
                                    @else
                                        Geen producten gevonden
                                    @endif
                                </select>

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
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Categorie toevoegen</h4>
                    <form method="post" action="/producten/categories/create">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-8">
                                <input id="category_name" type="text" class="form-control{{ $errors->has('productomschrijving') ? ' is-invalid' : '' }}" name="categoryname" required autofocus placeholder="Categorienaam">

                                @if ($errors->has('categorienaam'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('categorienaam') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8">
                                <button class="btn btn-success">Categorie toevoegen</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Categories</h4>
                    <div class="col-5">
                        <input id="category-filter" class="form-control" type="text" placeholder="Zoek.."><br>
                    </div>
                    <div class="table-responsive">
                        <table id="category-table" class="table">
                            <thead>
                            <tr>
                                <th scope="col">Categorienaam</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->category_name }}</th>
                                    <th scope="row"><a href="/producten/categories/delete/{{$category->category_id}}" class="btn label label-red" ><i class="m-r-5 font-14 mdi mdi-delete"></i></a></th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
