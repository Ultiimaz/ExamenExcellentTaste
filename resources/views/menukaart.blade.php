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
                            <th>Reserveernummer</th>
                            <th>Datum</th>
                            <th>Tijd</th>
                            </thead>
                            <tbody>
                        @foreach($producten->sortByDesc('productbeschrijving') as $product)
                            <tr>
                                <td>{{$product->productnummer}}</td>
                                <td>{{$product->productomschrijving}}</td>
                                <td>{{$product->prijs}}</td>
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