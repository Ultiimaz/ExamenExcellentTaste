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
    <div class="row " style="min-height: 500px; background-color: #5bc0de; padding-top: 10px; max-height: auto;">
        <div class="col-md-12">
            <h1 class="text-center">Menu</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        @foreach($categories->sortBy('category_id') as $category)
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $category->category_id }}" aria-expanded="true" aria-controls="collapse{{ $category->category_id }}">
                                        {{$category->category_name}}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse{{ $category->category_id }}" class="collapse show" data-collapse="{{ $category->category_id }}" aria-labelledby="heading{{ $category->category_id }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    <table>
                                    @foreach($producten->sortBy('category_id') as $product)

                                    @if((int)$product->category_id === $category->category_id )
                                        <tr>
                                            <td style="width: 800px;">{{$product->productomschrijving}}</td>
                                            <td>€{{$product->prijs}}</td>
                                        </tr>
                                            @endif
                                    @endforeach
                                    </table>
                                @if($category->category_id === 2 )
                                            <p>Alle hoofdgerechten worden geserveerd met twee soorten groenten, gebakken aardappeltjes en frites</p>
                                            @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 200px; background-color: #d9534f; padding-top: 10px;">
        <div class="row">
            <div class="col text-center">
                <h3>Contact</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                Adres: Hofstraat 1 <br />
                Postcode: 7311 KN <br />
                Plaats: Apeldoorn<br /><br />
                Telefoonnummer: 055 378 2473<br />
                Email: Excellent-Taste@gmail.com <br /><br />
            </div>
            <div class="col text-center">
                Openingstijden:<br />
                Ma/Vrij:  16:00-22:00<br />
                Za/Zo:    12:00-23:00
            </div>
        </div>
    </div>
</div>
</body>

