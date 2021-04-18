@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
            <div id="fondoRP" >
                    <div class="titulo tituloRP">
                        <img id="logoMAPLV" src="img/maplv.png">
                        <label >Registro de padrinos</label>
                        <label  id="subText">Si eres de quienes ama darle al mundo un respiro, sé parte de nuestra familia y adopta un árbol.</label>
                    </div>
                </div>
            </div>
            
            <div class="home baseRP">
            
                <div id="cajaRP"> 
                <div class="welcome_windowRP">
                    <div>
                        <img src="{{ asset('img\maplv.png') }}" >
                        <label id="txt_welcomeRP">Apadrina un árbol </label>
                        
                    <label id="txt_welcome2RP">¡Regístrate!</label>
                    </div>
                    
                </div>
                    <form id="cajaArbolRP" action="{{ route( 'nuevoPadrino' ) }}" method="post">
                        @csrf
                        <label id="txt_welcomeRP">Ingresa tus datos</label>
                        <input type="hidden" name="fp_id" value="{{ $padrino ? $padrino->FP_ID : 0 }}">
                        <div id="contTipo">
                            <div class="tipo1">
                                <label class="texto" for="persona">Persona</label>
                                <input type="radio" name="fp_tipo" value="P" class="check-size" {{ in_array( $padrino ? $padrino->FP_TIPO : old( 'fp_tipo' ), array(  'P', '' ) )  ? 'checked' : '' }}>
                            </div>
                            <div class="tipo2">
                                <label class="texto" for="empresa">Empresa</label>
                                <input type="radio" name="fp_tipo" value="E" class="check-size" {{ ( $padrino ? $padrino->FP_TIPO : old( 'fp_tipo' ) ) == 'E' ? 'checked' : '' }}>
                            </div>
                            <div class="tipo3">
                                <label class="texto" for="otro">Otro</label>
                                <input type="radio" name="fp_tipo" value="O" class="check-size" {{ ( $padrino ? $padrino->FP_TIPO : old( 'fp_tipo' ) ) == 'O' ? 'checked' : '' }}>
                            </div>
                        </div>
                    
                        <label class="texto" for="nombreCompleto">Nombre Completo:</label>
                        <input type="text" name="fp_nombre_completo" class="input-width" value="{{ $padrino ? $padrino->FP_NOMBRE_COMPLETO : old( 'fp_nombre_completo' ) }}">

                        <label class="texto" for="cedula">Cédula de identidad:</label>
                        <input type="text" name="fp_cedula" class="input-width" value="{{ $padrino ? $padrino->FP_CEDULA : old( 'fp_cedula' ) }}">

                        <label class="texto" for="correo">Dirección de correo electrónico:</label>
                        <input type="text" name="fp_correo" class="input-width" value="{{ $padrino ? $padrino->FP_CORREO : old( 'fp_correo' ) }}">
                        <div id="botonRP">
                            <button class="btn_registrarRP">Registrar</button>
                        </div>
                    </form>
             </div>
          </div>
          <div id="pie">
            <div class="bottom">
                <div class="left">
                    <img class="icon img-responsive" src="{{ asset( 'img/vector.png' ) }}"></img>
                    <div class="sitename">&copy;FUDEBIOL</div>
                </div>
                <div class="middle">
                    <a class="facebook contact" href="https://www.facebook.com/FUDEBIOL/">
                        <img class="icon img-responsive" src="img/facebook.png"></img>
                        <div class="label">@FUDEBIOL</div>
                    </a>
                    <a class="whatsapp contact" href="https://wa.me/+50672659372">
                        <img class="icon img-responsive" src="{{ asset( 'img/whatsapp.png' ) }}"></img>
                        <div class="label">2771-4131</div>
                    </a>
                    <a class="email contact" href="mailto:udebiol@gmail.com">
                        <img class="icon img-responsive" src="{{ asset( 'img/email.png' ) }}"></img>
                        <div class="label">fudebiol@gmail.com</div>
                    </a>
                </div>
               
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection
