@extends('layouts.app')

@section('content')

    <div id="body_home"> 
        <div id="contenido">
            <div id="fondoMensajes" >
                <div class="titulo tituloMensajes">
                    <img id="logoMAPLV" src="{{ asset('/img/logo.jpg')}}">
                    <label >Mensajería FUDEBIOL Digital</label>
                    <label  id="subText">¡Explora lo que los usuarios opinan de FUDEBIOL!</label>
                    </div>
                </div>
            </div>
            <div class="home">
               <div class="mensajes">
                    <form class="mascaramensajes" action="{{ route( 'eliminarMensajes' ) }}" method="post">  
                        @csrf
                        <div id="etc">
                            <label>Mensajes: {{ count($mensajes) }}</label>
                            <button id="btn_send" name="eliminar_btn">Eliminar seleccionados</button>
                            <button id="btn_send" name="leidos_btn" formaction="/marcarLeidos">Marcar como leidos</button>
                        </div> 
                        <div id="contenedor_mensajes">
                            @foreach ( $mensajes as $mensaje )
                            <div class="mesage">
                                @if ( $mensaje->FM_ESTADO == 1 )
                                <div id="unread"></div>
                                @endif
                                <div class="mesage_mail">
                                    <label><b>De:</b></label>
                                    <label>{{ $mensaje->FM_CORREO }}</label>
                                </div>
                                <div class="phone_mail">
                                    <label><b>Teléfono:</b></label>
                                    <label>{{ $mensaje->FM_TELEFONO }}</label>
                                </div>
                                <pre class="mesage_content" style="text-align: justify; text-justify: inter-word; white-space: pre-line; word-break: break-word;">{{ $mensaje->FM_TEXTO }}</pre>
                                @if ( $mensaje ->FM_ESTADO === 1)
                                <label for="leido">Leído</label>
                                <input name="ids[]"  id="leido" type="checkbox" value="{{ $mensaje->FM_ID }}"> 
                                @endif
                                <label for="eliminar">Eliminar</label> 
                                <input name="ids[]"  id="eliminar" type="checkbox" value="{{ $mensaje->FM_ID }}"> 
                            </div>
                            @endforeach
                        </div>
                    </form>    
               </div> 
            </div> <!--cierre de home-->
      
        </div>
    </div>
      
        
@endsection
