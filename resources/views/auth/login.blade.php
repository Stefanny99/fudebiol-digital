@extends('layouts.app')

@section('content')
<div class="baseLogIn">
    <div class="welcome_window">
        <div>
            <img src="img\logo.jpg">
            <label id="txt_welcome">¡Bienvenido a FUDEBIOL DIGITAL!</label>
            <label id="txt_welcome2">Regístrate para empezar a administrar el sitio</label>
        </div>
    </div>
    <div  class="logIn">
        <div class="cardi">
            <div>
                <div class="log">{{ __('Login') }}
                   
                </div>
            </div>
            <div class="card-body">
                <form class="form_size"method="POST" action="{{ route('login') }}">
                    @csrf
                    <div id="user">
                        <label>E-mail  </label>
                        <input id="email" type="email"name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div id="password">
                       
                        <div>
                        <label> Clave </label>
                             <i  id="show" class="fas fa-eye" onclick="showPassword(this)"></i>
                        </div>
                        <input id="clave" type="password" name="password" required autocomplete="current-password">
                           
                        
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


                                        @if (Route::has('password.request'))
                                           
                                        @endif
                                    
                                </div>
                            </form>
                        </div>
                    </div>
             
          
        </div>
    </div>    
@endsection
