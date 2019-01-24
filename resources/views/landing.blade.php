@include('layouts.head')


    <style>
        .landingpage{
            overflow-y:auto ;

        }
        .carousel-inner {
            max-height: 80vh;
            min-height: 60vh;
        }
        img{
            max-height:80vh ;
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
            top: 100px;
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
            margin-top: 10px;
            margin-bottom: 10px;

        }
        .carouselBlock .a:hover{
            background-color: purple;
            border-color: purple;
        }
        .carouselBlock .logout{
            width: 200px;
            border-radius: 6px;
            margin-top: 10px;
            margin-bottom: 10px;


        }
        .carouselBlock .logout:hover{
            background-color: darkred;
            border-color: darkred;
        }
        .accordion{
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 6px;
        }
        @media (min-width:320px)  { /* smartphones, portrait iPhone, portrait 480x320 phones (Android) */
            .carouselBlock{
                display: none;
            }
            .navbar{
                display: block;
            }
        }
        @media (min-width:1025px) { /* big landscape tablets, laptops, and desktops */
            .carouselBlock{
                display: block;
            }
            .navbar{
                display: none;
            }
        }


    </style>

<body class="landingpage">







    <div class="row">
        <div class="col-md-12">
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


                    {{--Verdwijnt wanneer mobiel:--}}
                    <div class="carouselBlock col-md-4 offset-md-8">
                        <h1>Welkom bij Excellent - Taste</h1>
                        <div class="col" style="font-style: italic">
                            Excellent Taste is de perfecte plek om een gezellige en vooral smakelijke avond te hebben. Ook kunt `s
                            middags bij ons langs komen voor een hapje.
                            <br>
                            <br>
                            Reserveren?
                            <br>
                            Dat kan hieronder, u kunt hier inloggen. Heeft u nog geen account?<br> dan kan u zich hier registereren

                        </div>

                        @guest
                            <div class="col">
                                <a class="btn btn-primary a" href="{{ route('login') }}">{{ __('Inloggen') }}</a>
                            @if (Route::has('register'))
                                <a class="btn btn-primary a" href="{{ route('register') }}">{{ __('Registreren') }}</a>

                            @endif
                        @else
                            <a class="btn btn-primary a" href="{{ route('login') }}">Naar mijn account</a>
                            <a style="" class="btn btn-danger logout" href="{{ route('logout') }}">Uitloggen</a>
                            <p style="color: rgb(255,255,255,0.8)">Ingelogde gebruiker: {{Auth::user()->voorletter}}. {{Auth::user()->achternaam}}</p>
                            </div>

                        @endguest
                        {{--<button type="button" href="{{ route('login') }}" class="btn">Inloggen</button>--}}
                       {{--<button type="button" class="btn">Registreren</button>--}}

                    </div>

                </div>
            </div>
        </div>
    </div>
<div class="container-fluid">
<div class="row " style="height: 300px; background-color: #fff7e5; padding-top: 10px;">
    <div class="col-md-12">
        <h1 class="text-center">Over Excellent Taste</h1>
        <div class="row">
            <div class="col-md-3">
                Middageten
            </div>
            <div class="col-md-3">
                Avondeten
            </div>
            <div class="col-md-3">
                Service
            </div>
            <div class="col-md-3">
                Alles er op en er aan
            </div>
        </div>


    </div>
</div>

    <div class="row " style="min-height: 500px; background-color: #9abeff; padding-top: 10px; max-height: auto;">
        <div class="col-md-12">
            <h1 class="text-center">Menu</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Collapsible Group Item #1
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Collapsible Group Item #2
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Collapsible Group Item #3
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div> <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Collapsible Group Item #3
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div> <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Collapsible Group Item #3
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div> <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Collapsible Group Item #3
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <div class="row " style="height: 200px; background-color: #ffa874; padding-top: 10px;">
    <div class="col-md-12">
        <h1 class="text-center">Contact</h1>
        <div class="row">
            <div class="col-md-3">
                Middageten
            </div>
            <div class="col-md-3">
                Avondeten
            </div>
            <div class="col-md-3">
                Service
            </div>
            <div class="col-md-3">
                Alles er op en er aan
            </div>
        </div>


    </div>
</div>
</div>
</body>