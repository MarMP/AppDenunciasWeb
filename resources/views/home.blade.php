@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil del usuario registrado</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @elseif (Auth::user()->esSuperAdmin())
                        <div>Acceso como Superadministrador</div>
                    @elseif ((Auth::user()->esAdmin()))
                        <div>Acceso como Administrador</div>
                    @endif
                        You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
