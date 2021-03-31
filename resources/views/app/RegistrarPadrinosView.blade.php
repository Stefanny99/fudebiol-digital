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
                        <div id="contTipo">
                            <div class="tipo1">
                                <label class="texto" for="persona">Persona</label>
                                <input type="radio" name="fp_tipo" value="P" class="check-size" checked>
                            </div>
                            <div class="tipo2">
                                <label class="texto" for="empresa">Empresa</label>
                                <input type="radio" name="fp_tipo" value="E" class="check-size">
                            </div>
                            <div class="tipo3">
                                <label class="texto" for="otro">Otro</label>
                                <input type="radio" name="fp_tipo" value="O" class="check-size">
                            </div>
                        </div>
                    
                        <label class="texto" for="nombreCompleto">Nombre Completo:</label>
                        <input type="text" name="fp_nombre_completo" class="input-width">

                        <label class="texto" for="cedula">Cédula de identidad:</label>
                        <input type="text" name="fp_cedula" class="input-width">

                        <label class="texto" for="correo">Dirección de correo electrónico:</label>
                        <input type="text" name="fp_correo" class="input-width">
                        <div id="botonRP">
                            <button class="btn_registrarRP">Registrar</button>
                        </div>
                    </form>
             </div>
          </div>
        </div>
    </div>
@endsection
