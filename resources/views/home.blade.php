@extends('layouts.dashboard')

@section('page')

    <style>
        #map {
            width: 100%;
            height: 350px;
            background-color: grey;
        }
    </style>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h3 class="card-title">Home</h3>
                        </div>
                    </div>
                    <div class="row">
                        <!-- column -->
                        <div class="col-lg-12">
                            Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen.
                            Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw,
                            toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een
                            font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd,
                            overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van
                            Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.

                        </div>
                        <!-- column -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>

                    <img style="width: 100%" src="https://media-cdn.tripadvisor.com/media/photo-s/06/d0/90/69/taste.jpg"/>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h3 class="card-title">Aankomende reservering(en)</h3>
                    </div>
                </div>
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <table class="table table-striped">
                            <thead>
                            <th>Reserveernummer</th>
                            <th>Datum</th>
                            <th>Tijd</th>
                            <th>Klantnummer</th>
                            </thead>
                            <tbody>
                            @foreach($reserveringen as $reservering)
                                <?php
                                    $date_now = new DateTime();
                                    $date2    = new DateTime($reservering->datum);

                                    if ($date_now > $date2) {
                                        echo  "";
                                    }else{
                                        echo '<tr>
                                            <td>', $reservering->reserveernummer,'</td>
                                            <td>', $reservering->datum,'</td>
                                            <td>', $reservering->tijd,'</td>
                                            <td>', $reservering->klantnummer,'</td>
                                        </tr>';;
                                    }
                                ?>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- column -->
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection