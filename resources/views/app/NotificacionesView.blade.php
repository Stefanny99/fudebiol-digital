@extends('layouts.app')

@section('content')
    <script>
        var routes = {
            "aceptarAdopcion": "{{ route( 'aceptarAdopcion' ) }}",
            "rechazarAdopcion": "{{ route( 'rechazarAdopcion' ) }}"
        };
    </script>
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
                        <div id="etcN">
                            <label>Nuevas adopciones: {{ count( $notificaciones) }}</label>
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
                                    <label>{{ $notificacion->fp_nombre_completo }}</label><br>
                                    <label><b>Cédula:</b></label>
                                    <label>{{ $notificacion->fp_cedula }}</label><br>
                                    <label><b>Del lote:</b></label>
                                    <label>{{ $notificacion->fl_nombre }}</label><br>
                                    <label><b>Especie:</b></label>
                                    <label>{{ $notificacion->fa_nombres_comunes }}</label><br>
                                    <label><b>Coordenada W:</b></label>
                                    <label>{{ $notificacion->fal_coordenada_W }}</label><br>
                                    <label><b>Coordenada N:</b></label>
                                    <label>{{ $notificacion->fal_coordenada_N }}</label><br>
                                </div>
                                <a href="">Descargar comprobante de pago</a><br>
                                <div>
                                    <button onclick="confirmarAdopcion( {{ $notificacion->fpa_id }} )">Aceptar</button>
                                    <button  onclick="rechazarAdopcion( {{ $notificacion->fpa_id }} )">Rechazar</button>
                                </div>    
                            </div>
                            @endforeach
                        </div>
                </div> 
            </div> <!--cierre de home-->
      
        </div>
    </div>
      
        
@endsection
