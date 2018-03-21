<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awsome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"
            integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ"
            crossorigin="anonymous"></script>
    <!--/Font Asome-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="{{asset('css/vendor/bulma.css')}}">
    <link rel="stylesheet" href="{{asset('css/vendor/custom.css')}}">
    <!-- End Style -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.11.2/trix.css">

    <script>
        window.App = {!!
         json_encode([
                'signedIn' => \Illuminate\Support\Facades\Auth::check(),
                'user' => \Illuminate\Support\Facades\Auth::user(),
         ])
         !!};
    </script>

    @yield('stylesheets')

</head>
<body>
<div id="app" class="mb-30">

    @include('layouts.nav')
    @yield('content')
    <flash message="{{session('flash')}}"></flash>

</div>

@include('layouts.footer')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

@yield('javascripts')
</body>
</html>
