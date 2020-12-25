@extends('layouts.app')

@section('content')
<div  class="logIn">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="log">{{ __('Login') }}
                <img src="img\logo.jpg">
            </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div id="user">
                        
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-Mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div id="password">
                           
                                <input id="clave" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Clave" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
                        </div>

                        

                        <div id="btn_forgot" class="form-group row mb-0">
                            <a id="forgot" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidó su contraseña?') }}
                                    </a>
                        

                                <button type="submit" class="btn_ingresar">
                                    {{ __('Ingresar') }}
                                </button>

                                @if (Route::has('password.request'))
                                   
                                @endif
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
