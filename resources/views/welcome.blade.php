<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>APPDenuncias</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">


        <!-- Styles -->
        <style>

            html, body {
                /*color: #636b6f;
                font-family: 'Nunito', sans-serif; */
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-color: #D8D3D2;
                font-family: 'Copperplate', 'Copperplate Gothic Light';
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            #link-login {
                color: #000000;
                font-size: 1.2rem;
                font-family: 'Copperplate', 'Copperplate Gothic Light';
            }

        </style>

        @extends('layouts.plantilla')
    </head>

    <body>
        <!-- Nav que gestiona el inicio de sesión del usuario ya registrado -->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src= "../images/logoNav2.png" alt="">
                </a>
                @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->esSuperAdmin())
                                <a id="link-login" href="{{ url('/inicioSuperAdmin') }}">Super Administrador</a>
                            @elseif (Auth::user()->esAdmin())
                                <a id="link-login" href="{{ url('/inicioAdmin') }}">Administrador</a>
                            @endif
                        @else
                            <a id="link-login" href="{{ route('login') }}">Iniciar sesión</a>
                        @endauth
                @endif
            </div>
        </nav>

        <!-- Cabecera -->
        <header class="masthead text-center">
            <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-9 mx-auto">
                            <h1 class="mb-2 text-uppercase"><strong>Mantén tu empresa libre de conflictos</strong></h1>
                        </div>
                    </div>
                </div>
        </header>

        <!-- Iconos Grid -->
        <section class="features-icons text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex  justify-content-center">
                                <i class="fas fa-mobile m-auto"></i>
                            </div>
                            <h3>Simple</h3>
                                <p class="lead mb-0">Fácil de usar y gestionar de forma rápida e intuitiva</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex justify-content-center">
                                <i class="fas fa-hands-helping m-auto"></i>
                            </div>
                            <h3>Comprometida</h3>
                                <p class="lead mb-0">Para una gestión eficaz por y para el usuario</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex  justify-content-center">
                                <i class="fas fa-key m-auto"></i>
                            </div>
                            <h3>Segura</h3>
                                <p class="lead mb-0">Cumpliendo con todos los requisitos de confidencialidad</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        @extends('layouts.footer')
    </body>
</html>
