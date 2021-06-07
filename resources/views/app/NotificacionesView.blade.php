@extends('layouts.app')

@section('content')
    <style>
        @keyframes anim-cargando{
            from {
                transform: rotate( 0deg );
            }
            to {
                transform: rotate( 360deg );
            }
        }
    </style>
    <script>
        var routes = {
            "aceptarAdopcion": "{{ route( 'aceptarAdopcion' ) }}",
            "rechazarAdopcion": "{{ route( 'rechazarAdopcion' ) }}"
        };
    </script>
    <div id="panel-cargando" style="display: none; position: fixed; width: 100vw; height: 100vh; top: 0px; left: 0px; background-color: rgba( 0, 0, 0, 0.5 ); z-index: 5; justify-content: center; align-items: center;">
        <i class="fas fa-spinner" style="font-size: 5rem; color: white; animation: anim-cargando 1s linear infinite;"></i>
    </div>
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
                    <div class="mascaramensajesN">
                        <div id="etcN">
                            <label id="cantidadNotificaciones">Nuevas adopciones: {{ count( $notificaciones) }}</label>
                        </div> 
                        <div id="contenedor_mensajesN">
                            @foreach ( $notificaciones as $notificacion )
                            <div class="mesageN" id="notificacion-{{ $notificacion->fpa_id }}">
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
                                    <label><b>Fila:</b></label>
                                    <label>{{ $notificacion->fal_fila }}</label><br>
                                    <label><b>Columna:</b></label>
                                    <label>{{ $notificacion->fal_columna }}</label><br>
                                </div>
                                <a href="{{ $notificacion->fpa_comprobante_formato ? asset( 'storage/comprobantes/' . $notificacion->fpa_id . '.' . $notificacion->fpa_comprobante_formato ) : asset( 'img/sinfoto.jpg' ) }}" download>Descargar comprobante de pago</a><br>
                                <div>
                                    <button class="btn_aceptar" onclick="confirmarAdopcion( {{ json_encode($notificacion) }})">Aceptar</button>
                                    <button class="btn_rechazar"onclick="rechazarAdopcion( {{ json_encode($notificacion) }} )">Rechazar</button>
                                </div>    
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> 
            </div>
            <div id="pie">
                <div class="bottom">
                    <div class="left">
                        &copy; 2021, Lizeth Monge Padilla, Diego Tames Vargas, Stefanny Barrantes Vargas
                    </div>
                <div class="middle">
                    <a class="facebook contact" href="https://www.facebook.com/FUDEBIOL/">
                        <img class="icon img-responsive" src="img/facebook.png"></img>
                        <div class="label">@FUDEBIOL</div>
                    </a>
                    <a class="whatsapp contact" href="https://wa.me/+50689731001">
                        <img class="icon img-responsive" src="{{ asset( 'img/whatsapp.png' ) }}"></img>
                        <div class="label">8973-1001</div>
                    </a>
                    <a class="whatsapp contact">
                        <img class="icon img-responsive" src="{{ asset( 'img/whatsapp.png' ) }}"></img>
                        <div class="label">2771-4131</div>
                    </a>
                    <a class="email contact" href="mailto:fudebiol@gmail.com">
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
