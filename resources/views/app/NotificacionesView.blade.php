@extends('layouts.app')

@section('content')

    <div id="body_home"> 
        <div id="contenido">
            <div id="fondoMensajes" >
                <div class="titulo tituloNotificaciones">
                    <img id="logoMAPLV" src="{{ asset('/img/MAPLV.png')}}">
                    <label >Notificaciones de adopciones</label>
                    <label  id="subText">¡Alguien se ha unido a la familia de mi árbol para la vida!</label>
                    </div>
                </div>
            </div>
            <div class="home">
                <div class="mensajesN">
                    <form class="mascaramensajesN" action="{{ route( 'eliminarNotificaciones' ) }}" method="post">  
                        @csrf
                        <div id="etcN">
                            <label>Nuevas adopciones: 12</label>
                            <button id="btn_send" name="eliminar_btn">Eliminar seleccionados</button>
                            <button id="btn_send" name="leidos_btn" formaction="/marcarNotificacionesLeidas">Marcar como leidas</button>
                        </div> 
                        <div id="contenedor_mensajesN">
                            @foreach ( $notificaciones as $notificacion )
                            <div class="mesageN">
                                <div id="unreadN"></div>
                                <div class="mesage_contentN">
                                    <H2>¡Hay una nueva adopción!</H2>
                                </div>
                                <div class="mesage_data">
                                    
                                    <label><b>A nombre de:</b></label>
                                    <label>Lizeth Monge Padilla</label><br>
                                    <label><b>Cédula:</b></label>
                                    <label>117560371</label><br>
                                    <label><b>Del árbol:</b></label>
                                    <label>L1B13</label><br>
                                    <label><b>Especie:</b></label>
                                    <label>Guayabo</label><br>
                                    <label><b>Coordenada W:</b></label>
                                    <label>55"43"56</label><br>
                                    <label><b>Coordenada N:</b></label>
                                    <label>55"78"56</label><br>
                                </div>
                                <a href="">Descargar comprobante de pago</a><br>
                                <label for="leidoN">Leído</label>
                                <input type="checkbox" id="leidoN"> 
                                    <label for="eliminarN">Eliminar</label>
                                <input type="checkbox" id="eliminarN">       
                            </div>
                            @endforeach
                        </div>
                    </form>
                </div> 
            </div> <!--cierre de home-->
      
        </div>
    </div>
      
        
@endsection
