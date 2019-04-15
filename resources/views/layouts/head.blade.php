
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/assets/libs/popper.js/dist/umd/popper.min.js') }}" defer></script>
    <script src="{{ asset('js/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="{{ asset('js/app-style-switcher.js') }}" defer></script>
    <script src="{{ asset('js/sidebarmenu.js') }}" defer></script>
    <script src="{{ asset('js/waves.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    <!-- Custom CSS -->
    <link href="{{asset ('css/style.css') }}" rel="stylesheet">
