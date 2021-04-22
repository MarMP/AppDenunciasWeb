<title>Olvidé la contraseña</title>

@extends('layouts.plantilla')

@section('contenido')

<nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src= "../images/logoNav2.png" alt="">
        </a>
    </div>
</nav>

<header class="mastheadforgot text-center">
    <div class="container">
        <form class="box" id="forgot" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="row">
                <div class="col-12">
                    <h2>¿Has olvidado tu contraseña?</h2>
                    <h6>Si has olvidado la contraseña, proporciona tu dirección de correo electrónico y te enviaremos un email con instrucciones de cómo recuperarla.</h6>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        <div class="form-group row">
                            <button id ="forgot-button" type="submit">
                                {{ __('Recuperar contraseña') }}
                            </button>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </form>
    </div>
</header>

<footer>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                        <p>&copy; APPDenuncias | <a id="link" href="#">Aviso legal</a> | <a id="link" href="#">Cookies </a>
                            |  <a id="link" href="#">Configurar Cookies</a></p>
                    </div>
            </div>
        </div>
    </div>
</footer>

@endsection
