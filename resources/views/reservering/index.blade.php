@extends('layouts.dashboard')

@section('page')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


@if(!empty($reserveringen->get()->first()))
                            <table class="table table col-12">
                                <thead>
                                <tr>
                                    <th scope="col">reserveernummer</th>
                                    <th scope="col">datum</th>
                                    <th scope="col">tijd</th>
                                    <th scope="col">tafelnummer(s)</th>
                                    <th scope="col">aanpassen</th>
                                    <th scope="col">annuleren</th>
                                </tr>
                                </thead>

                                <tbody>
    @foreach($reserveringen->get() as $reservering)
        <tr>
            <th scope="row">{{$reservering->reserveernummer}}</th>
            <td>{{$reservering->datum}}</td>
            <td>{{$reservering->tijd}}</td>
            <td>@foreach(\App\TableReservation::Where('reserveernummer',$reservering->reserveernummer)->get() as $tafel)
                    {{--{{dd($tafel)}}--}}
                    <a class="badge badge-pill badge-danger">tafel: {{$tafel->tafelnummer}}</a>
                @endforeach
            </td>
            <td><a class="btn" name="cancel" value="annuleren" href="/reserveer/update/{{$reservering->reserveernummer}}" /> aanpassen</td></td>
            <td><a class="btn" name="cancel" value="annuleren" href="/reserveer/delete/{{$reservering->reserveernummer}}" /> annuleren</td>
        </tr>
    @endforeach
    @else
        er zijn momenteel geen reserveringen
@endif

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
@endsection
