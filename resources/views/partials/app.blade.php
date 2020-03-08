<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('stadmin.title') }}</title>

        <link rel="stylesheet" href="{{ stadmin_css_asset('vendors.min.css') }}">
        <link rel="stylesheet" href="{{ stadmin_css_asset('style.css') }}">
        <link rel="stylesheet" href="{{ stadmin_css_asset('responsive.css') }}">
    </head>
    <body>
        @include('stadmin::partials.sidemenu')

        <div class="main-content d-flex flex-column">
            @include('stadmin::partials.nav')

            @yield('content')

            @include('stadmin::partials.footer')
        </div>

        <script src="{{ stadmin_js_asset('vendors.min.js') }}"></script>
        <script src="{{ stadmin_js_asset('chartjs/chartjs.min.js') }}"></script>
        <script src="{{ stadmin_js_asset('jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ stadmin_js_asset('jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ stadmin_js_asset('custom.js') }}"></script>
    </body>
</html>
