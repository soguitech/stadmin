<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('stadmin.title', 'Stadmin') }}</title>

        <link rel="stylesheet" href="{{ stadmin_css_asset('bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ stadmin_css_asset('font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ stadmin_css_asset('main.css') }}">
        <link rel="stylesheet" href="{{ stadmin_css_asset('color_skins.css') }}">
    </head>
    <body class="theme-orange">
        <div id="wrapper">
            <div class="vertical-align-wrap">
                <div class="vertical-align-middle auth-main">
                    <div class="auth-box">
                        <div class="top">
                            <img src="http://www.wrraptheme.com/templates/lucid/hr/html/assets/images/logo-white.svg" alt="Lucid">
                        </div>
                        <div class="card">
                            <div class="header">
                                <p class="lead">Connectez-vous à votre compte</p>
                            </div>
                            <div class="body">
                                <form class="form-auth-small" action="{{ route('stadmin.login') }}" method="POST">
                                    @csrf

                                    @if($errors->has(config('stadmin.auth.username')))
                                        @foreach($errors->get(config('stadmin.auth.username')) as $message)
                                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                                        @endforeach
                                    @endif

                                    <div class="form-group">
                                        <label for="signin-email" class="control-label sr-only">Email</label>
                                        <input type="email" class="form-control" id="signin-email" name="{{ config('stadmin.auth.username')  }}" placeholder="{{ ucfirst(config('stadmin.auth.username')) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="signin-password" class="control-label sr-only">Mot de passe</label>
                                        <input type="password" class="form-control" id="signin-password" name="password" placeholder="Mot de passe">
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="fancy-checkbox element-left">
                                            <input type="checkbox" name="remember">
                                            <span>Se souvenir de moi</span>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">CONNEXION</button>
                                    <div class="bottom">
                                        <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="#">Mot de passe oublié?</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
