
<title>Iniciar sesión</title>

@extends('layouts.plantilla')

@section('contenido')

    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src= "../images/logoNav2.png" alt="">
            </a>
        </div>
    </nav>

    <header class="mastheadlogin text-center">
        <div class="container">
            <form class="box" method="POST" action="{{ route('login') }}">
                <div class="row">
                    <div class="col-12">
                        <h2>Inicia Sesión</h2>
                            @csrf
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror


                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                            </div>

                            <div class="form-group row">
                                <button type="submit">
                                    {{ __('Iniciar Sesión') }}
                                </button>
                            </div>
                            <div class="form-forgot">
                                @if (Route::has('password.request'))
                                    <a id="link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste la contraseña?') }}
                                    </a>
                                @endif
                            </div>
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



