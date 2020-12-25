@extends('layouts.app')

@section('content')
<div class="container register">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card cuerpo">
                <div class="card-header reg">{{ __('Registro de Usuarios') }}
                    <img id="logo" src="img\logo.jpg">
                </div>

                <div class="card-body cuerpo">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div id="nombre" class="form-group row">
                            
                            <div  class="col-md-6">
                                <input id="name" placeholder="Nombre" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="correo" class="form-group row contenido">
                           

                            <div class="col-md-6">
                                <input id="email" placeholder="E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="contraseña" class="form-group row">
                            

                            <div class="col-md-6">
                                <input  type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Clave" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="confirmar" class="form-group row">

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" placeholder="Confirmar clave" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn_registrar">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
