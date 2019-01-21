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
                    <script>
                        function onSubmit(e)
                        {
                            $.ajax({
                                type: "post",
                                data: {
                                    datum: $("#reserveringstart").val(),
                                    time: $("#time").val(),
                                    tafel1: selectedTables[0],

                                    tafel2: selectedTables[1],
                                    aantal_gasten: $("#aantal_gasten").val(),

                                }
                            });

                        }
                    </script>
                    <form method="post" onsubmit="event.preventDefault();onSubmit()">
                        @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label>
                                            vanaf:
                                          <input id="reserveringstart" type="datetime-local" class="form-control" id="reserveringstart"
                                        name="datum" value="2018-06-12T19:30"
                                        min="2018-06-07T00:00" max="2018-06-14T00:00">
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        hoelang:
                                        <select name="time"class="form-control" id="time" title="">
                                            <option class="form-control" value="30">30 minuten</option>
                                            <option class="form-control" value="60">1 uur</option>
                                            <option class="form-control" value="120"> 2 uur</option>
                                        </select>
                                    </div>
                                    <script>
                                        var selectedTables = [];
                                        var selected = 0;


                                        function deleteTafel(id)
                                        {
                                            selected--;
                                            selectedTables.splice(selectedTables.indexOf(id));
                                            $("#badge"+id).remove();
                                        }
                                        function addTafel(value){
                                            selected++;
                                            if(selected <= 2){
                                                var span  = $('<h1></h1>');
                                                $(span).addClass("badge badge-pill badge-danger");
                                                $(span).click(function()
                                                {
                                                    deleteTafel(value);
                                                });
                                                $(span).attr('id',"badge"+value);
                                                $(span).text("tafel "+value);
                                                $('#tafels').append($(span));
                                                selectedTables.push(value);
                                                console.log(selectedTables);
                                            }

                                        }
                                    </script>
                                    <div id='tafels' class="col-md-8">
                                        tafel
                                        <select name="tafel" class="form-control" id="tafel" onchange="addTafel(value)" title="">
                                            @foreach($tables->where('status',1) as $table)
                                                <option name="tafel"  value="{{$table->tafelnummer}}">tafel nummer: {{$table->tafelnummer}} aantal stoelen: {{$table->aantalstoelen}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-8 col-xs-8">
                                        aantal gasten
                                        <select name="aantal_gasten" id="aantal_gasten" class="form-control col-md-2 col-xs-1"  title="">
                                            <option class="form-control" value="1">1</option>
                                            <option class="form-control" value="2">2</option>
                                            <option class="form-control" value="3">3</option>
                                            <option class="form-control" value="4">4</option>
                                            <option class="form-control" value="5">5</option>
                                            <option class="form-control" value="6">6</option>
                                            <option class="form-control" value="7">7</option>
                                            <option class="form-control" value="8">8</option>
                                        </select>
                                        {{--<input type="text" placeholder="6" required name="aantal_gasten" class="form-control col-md-2 col-xs-1" />--}}
                                    </div>
                                    <div class="col-md-8 pt-5">
                                        <input type="submit" class="btn btn-primary" />
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>

@endsection
