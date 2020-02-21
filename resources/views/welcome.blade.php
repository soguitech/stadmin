<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Security') }}</title>

        <link type="text/css" rel="stylesheet" href="{{ asset('css/vendor/stadmin/app.min.css') }}"/>

        <style>
            .authentication::before{
                background-image:url("{{ asset('images/bg.png') }}") !important;
                content:'';
                position:absolute;
                z-index:1;
                background-repeat:no-repeat;
                opacity:0.02;
                width:100%;
                height:100%;

            }
        </style>

    </head>
    <body class="page-header-fixed theme-black">

        <div id="app">
            <base-app></base-app>
        </div>

        <script src="{{ mix('js/vendor/stadmin/app.js') }}"></script>
    </body>
</html>
