@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div id="body" class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <script>
                        function onSubmit(e)
                        {
                            if(!$("#reserveringstart").val())
                            {
                                return;
                            }
                            if(!$("#time").val())
                            {
                                return;
                            }
                            $.ajax({
                                type: "post",
                                data: {
                                    datum: $("#reserveringstart").val(),
                                    time: $("#time").val(),
                                    tafel1: selectedTables[0],
                                    dieetwensen: $('#dieetwensen').val(),
                                    tafel2: selectedTables[1],
                                    aantal_gasten: $("#aantal_gasten").val()

                                }

                        }).done(function(e){
                                $("#body").prepend("<div class=\"alert alert-success\" role=\"alert\">\n" +
                                    "Uw reservering is geplaatst \n" +
                                    "</div>\n");

                            })
                        }

                        function getAvailableDates() {
                            $.ajax({
                                url: "/tables",
                                type: "post",
                                data: {
                                    datum: $("#reserveringstart").val(),
                                    time: $("#time").val()
                                },
                            }).done(function (response) {
                                $('#tafel').empty();
                                $('#tafel').append('<option>kies hier onder uw tafel!</option>');
                                Object.values(response).forEach(function(tafel)
                                {
                                    $('#tafel').append("<option name='tafel' value="+tafel.tafelnummer+" >tafelnummer: "+tafel.tafelnummer+"</option>");
                                });
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
                                          <input type="datetime-local" id="reserveringstart" class="form-control"
                                        name="datum"
                                            required
                                          >
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        hoelang:
                                        <select name="time" class="form-control" id="time"  onchange="getAvailableDates()" title="" required>
                                            <option>kies hier een tijd</option>
                                            <option class="form-control" value="60">1 uur</option>
                                            <option class="form-control" value="90">anderhalf uur</option>
                                            <option class="form-control" value="120"> 2 uur</option>
                                        </select>
                                    </div>
                                    <script>
                                        var selectedTables = [];
                                        var selected = 0;
                                        window.addEventListener("load", function() {
                                            var now = new Date();
                                            var max = now;
                                            var utcString = now.toISOString().substring(0,19);
                                            var year = now.getFullYear();
                                            var month = now.getMonth() + 1;
                                            var day = now.getDate();
                                            var hour = now.getHours();
                                            var minute = now.getMinutes();
                                            var second = now.getSeconds();
                                            var localDatetime = year + "-" +
                                                (month < 10 ? "0" + month.toString() : month) + "-" +
                                                (day < 10 ? "0" + day.toString() : day) + "T" +
                                                (hour < 10 ? "0" + hour.toString() : hour) + ":" +
                                                (minute < 10 ? "0" + minute.toString() : minute) +
                                                utcString.substring(16,19);
                                            var datetimeField = document.getElementById("reserveringstart");
                                            datetimeField.value = localDatetime;
                                            datetimeField.min = localDatetime;
                                            datetimeField.max = max.setDate(now.getDate() + 1);
                                        });
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
                                        <select name="tafel" class="form-control"  required id="tafel" onchange="addTafel(value)" title="">
                                            <option>kies hier uw tafel</option>
                                        </select>
                                    </div>

                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-8 col-xs-8">
                                        aantal gasten
                                        <select name="aantal_gasten" id="aantal_gasten" class="form-control col-md-2 col-xs-1" required title="">
                                            <option class="form-control" value="1">1</option>
                                            <option class="form-control" value="2">2</option>
                                            <option class="form-control" value="3">3</option>
                                            <option class="form-control" value="4">4</option>
                                            <option class="form-control" value="5">5</option>
                                            <option class="form-control" value="6">6</option>
                                            <option class="form-control" value="7">7</option>
                                            <option class="form-control" value="8">8</option>
                                        </select>
                                        <textarea id="dieetwensen" name="dieetwensen" placeholder="vul hier uw dieetwensen in"></textarea>
                                    </div>
                                    <div class="col-md-8 pt-5">
                                        <input type="submit" class="btn btn-primary" />
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
