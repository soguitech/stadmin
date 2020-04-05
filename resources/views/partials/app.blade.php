<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('stadmin.title') }}</title>

        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="{{ stadmin_css_asset('bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ stadmin_css_asset('font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ stadmin_css_asset('toastr.min.css') }}">
        <link rel="stylesheet" href="{{ stadmin_css_asset('main.css') }}">
        <link rel="stylesheet" href="{{ stadmin_css_asset('color_skins.css') }}">

        @yield('style')
    </head>
    <body class="theme-orange">
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="http://www.wrraptheme.com/templates/lucid/hr/html/assets/images/logo-icon.svg" width="48" height="48" alt="Lucid"></div>
                <p>SVP attendre...</p>
            </div>
        </div>

        <div id="wrapper">
            @include('stadmin::partials.nav')

            @include('stadmin::partials.sidemenu')

            @yield('content')
        </div>

        <script src="{{ stadmin_js_asset('bundles/libscripts.bundle.js') }}"></script>
        <script src="{{ stadmin_js_asset('bundles/vendorscripts.bundle.js') }}"></script>
        <script src="{{ stadmin_js_asset('toastr.js') }}"></script>
        <script src="{{ stadmin_js_asset('bundles/chartist.bundle.js') }}"></script>
        <script src="{{ stadmin_js_asset('bundles/knob.bundle.js') }}"></script>
        <script src="{{ stadmin_js_asset('bundles/mainscripts.bundle.js') }}"></script>
        <script src="{{ stadmin_js_asset('index.js') }}"></script>

        @yield('script')
    </body>
</html>
