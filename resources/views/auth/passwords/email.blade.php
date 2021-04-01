@extends('layouts.app')

@section('content')
<div class="containerReset">
            <div class="rContenedor">
                
                <div class="cheader">
                    <img id="logo" src="\img\logo.jpg">
                    <label id="rc" ><b>Restaurar contraseña</b></label>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div id="correo" >
                           
                                <input id="email_reset" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary btn_restaurar">
                                    {{ __('Enviar al correo un link de restauración') }}
                                </button>
                            
                        </div>
                    </form>
                </div>
            </div>
</div>
@endsection
