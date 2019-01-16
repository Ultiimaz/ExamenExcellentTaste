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
                            <h3 class="card-title">Contact</h3>
                        </div>
                    </div>
                    <div class="row">
                        <!-- column -->
                        <div class="col-lg-12">
                            Adres: Hofstraat 1 <br />
                            Postcode: 7311 KN <br />
                            Plaats: Apeldoorn<br /><br />
                            Telefoonnummer: 055 378 2473<br />
                            Email: Excellent-Taste@gmail.com <br /><br />
                            Openingstijden:<br />
                            Ma/Vrij:  16:00-22:00<br />
                            Za/Zo:    12:00-23:00

                        </div>
                        <!-- column -->
                    </div>
                </div>
            </div>
        </div>
        <script>
            function initMap() {
                var uluru = {lat: 52.2124065, lng: 5.9648086};

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: uluru
                });
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                });

            }
        </script>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Kaart</h4>
                    <div class="feed-widget">
                        <div id="map"></div>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDj8Bfw8XPv_lVX6I1kzelUSU2rL9WVejY&callback=initMap" async defer></script>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection