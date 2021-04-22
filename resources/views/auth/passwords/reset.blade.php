<title>Restablecer contraseña</title>

@extends('layouts.plantilla')

@section('contenido')

    <header class="mastheadforgot text-center">
        <div class="container">
            <form class="box" id="forgot" method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h2>Restablecer contraseña</h2>
                            <input type="hidden" name="token" value="{{ $token }}">

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Nueva contraseña" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirma la contraseña" required autocomplete="new-password">

                            <div class="form-group row">
                                <button id ="forgot-button" type="submit">
                                    {{ __('Restablecer') }}
                                </button>
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
