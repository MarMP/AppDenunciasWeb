<title>Mi Perfil</title>

@extends('layouts.plantilla')

@section('contenido')

    <!-- Styles -->
    <style>

        html, body {
            background: url("../images/fondoAdmin.jpg") no-repeat center center;
        }
        .navbar{
            background:#eceff1 !important;
        }
        #info {
            width: 50%;
            margin: 0 auto;
        }

    </style>

    <script type="text/javascript">

        function mostrarPassword(){
            var cambio = document.getElementById("new_password");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }

        function mostrarConfirmacionPassword(){
            var cambio = document.getElementById("new_confirm_password");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }
    </script>

    <nav class="navbar static-top">
        <div class="container">
            @if (Auth::user()->esSuperAdmin())
                <a class="navbar-brand" href="/inicioSuperAdmin">
            @elseif (Auth::user()->esAdmin())
                <a class="navbar-brand" href="/inicioAdmin">
            @else
                <a id="link-login" href="{{ route('login') }}">Iniciar sesión</a>
            @endif
                <img src= "../images/logoNav2.png" alt="">
            </a>
        </div>
    </nav>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <header class="text-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 mt-5 pt-5">
                    <div class="row z-depth-3">
                        <div class="col-sm-4 bg-dark rounded-left">
                            <div class="card-block text-center text-white">
                                <i id= "info" class="fas fa-user-tie fa-7x mt-5"></i>
                                <h2 class="font-weight-bold mt-4">Usuario:<br> {{ Auth::user()->name }} {{ Auth::user()->apellidos }}</h2>
                                <br>
                            </div>
                        </div>
                        <div class="col-sm-8 bg-white rounded-right">
                            <h3 class="mt-3 text-center">Información del usuario</h3>
                            <hr class="bg-primary mt-0 w-25">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="font-weight-bold">Email:</p>
                                    <h5 class=" text-muted">{{ Auth::user()->email }}</h5>
                                </div>
                                <div class="col-sm-6">
                                    <p class="font-weight-bold">Tipo de usuario:</p>
                                    <h5 class="text-muted">
                                        @if (Auth::user()->role_id  == 1)
                                            Superadministrador
                                        @else
                                            Administrador
                                        @endif
                                    </h5>
                                </div>
                            </div>
                            <h4 class="mt-3">Inicio de sesión y seguridad</h4>
                            <hr class="bg-primary mt-0 w-25">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-dark">
                                          <a class="collapsed card-link text-white" data-toggle="collapse" href="#collapseTwo" aria-expanded="true">
                                            Cambiar Contraseña
                                          </a>
                                        </div>
                                            <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                                                <form method="POST" action="{{ route('change.password') }}">
                                                    @csrf

                                                    @foreach ($errors->all() as $error)
                                                       <p class="text-danger">{{ $error }}</p>
                                                    @endforeach

                                                    <div class="col-sm-12">
                                                        <br>
                                                        <label for="password"><strong>Contraseña actual</strong></label>
                                                        <input id="inputPassword" type="password" class="form-control" name="contraseña_actual">

                                                        <label for="password"><strong>Nueva contraseña</strong></label>
                                                        <div class="input-group">
                                                            <input id="new_password" type="password" class="form-control" name="nueva_contraseña">
                                                                <div class="input-group-append">
                                                                    <button id="show_password" class="btn btn-dark" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
                                                                </div>
                                                        </div>

                                                        <label for="password"><strong>Confirmar contraseña</strong></label>
                                                        <div class="input-group">
                                                            <input id="new_confirm_password" type="Password" class="form-control" name="confirmar_contraseña">
                                                                <div class="input-group-append">
                                                                    <button id="show_password" class="btn btn-dark" type="button" onclick="mostrarConfirmacionPassword()"><span class="fa fa-eye-slash icon"></span></button>
                                                                </div>
                                                        </div>
                                                        <br>
                                                        <button type="submit" class="btn btn-dark mb-2">Aceptar cambios</button>
                                                    </div>
                                                </form>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

