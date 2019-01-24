@extends('layouts.dashboard')

@section('page')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h3 class="card-title">Kaart</h3>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                            <th></th>
                            <th>Gerecht</th>
                            <th>Prijs</th>
                            </thead>
                            <tbody>
                        @foreach($producten->sortBy('category_id') as $product)
                            <tr>
                                <td>{{$product->category()[0]->category_name}}</td>
                                <td>{{$product->productomschrijving}}</td>
                                <td>€{{$product->prijs}}</td>
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