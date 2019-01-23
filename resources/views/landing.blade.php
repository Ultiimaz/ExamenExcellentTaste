@include('layouts.head')


    <style>
        .carousel-inner {
            max-height: 80vh;
        }
         /*.carouselLandingPage{*/
            /*background-color: rgba(0, 47, 255, 0.6);*/
        /*}*/
        .carousel-item:after {
            content:"";
            display:block;
            position:absolute;
            top:0;
            bottom:0;
            left:0;
            right:0;
            background:rgba(0,0,0,0.5);
        }
        .carouselBlock{
            position: absolute;
            top: 40vh;
            color: white;
            font-weight: bold;
        }
        .carouselBlock .a{
            width: 200px;
            font-size: 15px;
            border-radius: 6px;
            background-color: #7460ee;
            color: white;
            margin-right: 30px;
            border-color: #7460ee;
        }
        .carouselBlock .a:hover{
            background-color: purple;
            border-color: purple;
        }
        .carouselBlock .logout{
            width: 200px;
            border-radius: 6px;
        }
        .carouselBlock .logout:hover{
            background-color: darkred;
            border-color: darkred;
        }
    </style>
<body class="landingpage">
    <div class="row">
        <div class="col-md-12">
    {{--<div class="carouselLandingPage"></div>--}}
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="https://images.pexels.com/photos/302894/pexels-photo-302894.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://images.pexels.com/photos/1703272/pexels-photo-1703272.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://images.pexels.com/photos/1482803/pexels-photo-1482803.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Third slide">
                    </div>

                    <div class="carouselBlock offset-md-6">
                        <h1>Welkom bij Excellent - Taste</h1>
                        <p style="font-style: italic">Excellent Taste is de perfecte plek om een gezellige en vooral smakelijke avond te hebben. Ook kunt `s
                            middags bij ons langs komen voor een hapje.
<br>
<br>
                            Reserveren?
                            <br>
                            Dat kan hieronder, u kunt hier inloggen. Heeft u nog geen account?<br> dan kan u zich hier registereren

                        </p>
                        @guest
                                <a class="btn btn-primary a" href="{{ route('login') }}">{{ __('Inloggen') }}</a>
                            @if (Route::has('register'))
                                <a class="btn btn-primary a" href="{{ route('register') }}">{{ __('Registreren') }}</a>

                            @endif
                        @else
                            <a class="btn btn-primary a" href="{{ route('login') }}">Naar mijn account</a>
                            <a style="" class="btn btn-danger logout" href="{{ route('logout') }}">Uitloggen</a>
                            <br>
                            <br>
                            <br>
                            <p style="color: rgb(255,255,255,0.8)">Ingelogde gebruiker: {{Auth::user()->voorletter}}. {{Auth::user()->achternaam}}</p>
                        @endguest
                        {{--<button type="button" href="{{ route('login') }}" class="btn">Inloggen</button>--}}
                       {{--<button type="button" class="btn">Registreren</button>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>