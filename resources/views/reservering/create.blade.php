@extends('layouts.dashboard')

@section('content')
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
                    <form method="post">
                        @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label>
                                            vanaf:
                                          <input type="datetime-local" class="form-control" id="reserveringstart"
                                        name="datum" value="2018-06-12T19:30"
                                        min="2018-06-07T00:00" max="2018-06-14T00:00">
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        hoelang:
                                        <select name="time"class="form-control"  title="">
                                            <option class="form-control" value="30">30 minuten</option>
                                            <option class="form-control" value="60">1 uur</option>
                                            <option class="form-control" value="120"> 2 uur</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        tafel
                                        <select name="tafel" class="form-control"  title="">
                                            @foreach($tables->where('status',1) as $table)
                                                <option name="tafel" value="{{$table->tafelnummer}}">tafel nummer: {{$table->tafelnummer}} aantal stoelen: {{$table->aantalstoelen}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-8 col-xs-8">
                                        aantal gasten
                                        <input type="text" placeholder="6" required name="aantal_gasten" class="form-control col-md-2 col-xs-1" />
                                    </div>
                                    <div class="col-md-8 pt-5">
                                        <input type="submit" class="btn btn-primary" />
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>

@endsection
