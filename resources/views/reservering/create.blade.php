@extends('layouts.reservering')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
                                        name="tijd-in" value="2018-06-12T19:30"
                                        min="2018-06-07T00:00" max="2018-06-14T00:00">
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>
                                            tot:
                                            <input type="datetime-local" class="form-control" name="tijd_uit" id="reserveringstart"
                                                   name="meeting-time" value="2018-06-12T19:30"
                                                   min="2018-06-07T00:00" max="2018-06-14T00:00">
                                        </label>
                                    </div>
                                    <div class="col-md-8 col-xs-8">
                                        aantal gasten
                                        <input type="text" placeholder="6" name="aantalgasten" class="col-md-2 col-xs-1" />
                                    </div>
                                    <div class="col-md-8 pt-5">
                                        <input type="submit" class="btn btn-primary" />
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>

@endsection
