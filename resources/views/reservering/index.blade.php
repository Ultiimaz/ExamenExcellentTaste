@extends('layouts.dashboard')

@section('page')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('reserveercreate')}}">
                        <table class="table table-dark col-12">
                            <thead>
                            <tr>
                                <th scope="col">reserveernummer</th>
                                <th scope="col">datum</th>
                                <th scope="col">tafelnummer(s)</th>
                                <th scope="col">tijd</th>
                                <th scope="col">annuleren</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">2</th>
                                <td>Marfdgdfgdfgfdk</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td><a class="btn" name="cancel" value="annuleren" href="/reserveer/delete/1" /> annuleren</td>

                            </tr>    <tr>
                                <th scope="row">2</th>
                                <td>Maddrk</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td><a class="btn" name="cancel" value="annuleren" href="/reserveer/delete/1" /> annuleren</td>

                            </tr>    <tr>
                                <th scope="row">2</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td><a class="btn" name="cancel" value="annuleren" href="/reserveer/delete/1" /> annuleren</td>

                            </tr>

                            </tbody>
                        </table>
                welkom op de Reserveerpagina!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
