<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('stadmin.title', 'Stadmin') }}</title>

    <link rel="stylesheet" href="{{ stadmin_css_asset('vendors.min.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ stadmin_css_asset('style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ stadmin_css_asset('responsive.css') }}">

</head>
    <body>
        <div class="login-area"
             @if(config('stadmin.login_background_image'))
                 style="background-image: url({{config('stadmin.login_background_image')}}) !important;
                    background-position: center center !important;
                    background-size: cover !important;
                    background-repeat: no-repeat !important;"
            @endif>
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="login-form">
                        <div class="logo">
                            <a href="dashboard-analytics.html">
                                <img src="{{ asset(config('stadmin.path_logo_img')) }}" alt="logo">
                            </a>
                        </div>

                        <h2>Bienvenue</h2>

                        <form action="{{ route('stadmin.login') }}" method="POST">
                            @csrf
                            @if($errors->has('email'))
                                @foreach($errors->get('username') as $message)
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @endforeach
                            @endif


                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email" title="">
                                <span class="label-title"><i class='bx bx-user'></i></span>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Mot de passe" title="">
                                <span class="label-title"><i class='bx bx-lock'></i></span>
                            </div>

                            <div class="form-group">
                                <div class="remember-forgot">
                                    <label class="checkbox-box">Se souvenir de moi
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>

                                    <a href="forgot-password.html" class="forgot-password">Mot de passe oublié?</a>
                                </div>
                            </div>

                            <button type="submit" class="login-btn">Connexion</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ stadmin_js_asset('vendors.min.js') }}"></script>

        <!-- ApexCharts JS -->

        <!-- ChartJS -->
        <script src="{{ stadmin_js_asset('chartjs/chartjs.min.js') }}"></script>

        <script src="{{ stadmin_js_asset('jvectormap-1.2.2.min.js') }}"></script>
        <!-- jvectormap World Mil JS -->
        <script src="{{ stadmin_js_asset('jvectormap-world-mill-en.js') }}"></script>
        <!-- Custom JS -->
        <script src="{{ stadmin_js_asset('custom.js') }}"></script>
    </body>
</html>
