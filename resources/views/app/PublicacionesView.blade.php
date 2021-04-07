@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
            <div class="home publicacion-fondo">
                <a href="{{route('editorPublicaciones')}}" class="crear-publicacion">Crear una nueva publicación</a>
                <a href="{{route('administrarPublicaciones')}}" class="crear-publicacion">Administrar publicaciones</a>
                <div id="contenedor-publicaciones">
                    @foreach ( $publicaciones as $publicacion )
                    <div class="publicacion-base">
                        <div class="publicacion-encabezado">
                            <img class="publicacion-logo" src="{{ asset('/img/logo.jpg')}}">
                            <div class="titulo-fecha">
                                <label class="publicacion-titulo"><b>{{ $publicacion->FP_TITULO }}</b></label>
                                <label class="publicacion-fecha">{{ \Carbon\Carbon::parse($publicacion->FP_FECHA)->format('d/m/Y') }}</label>
                            </div>
                        </div>
                        <div id="publicacion-descripcion">{{ $publicacion->FP_DESCRIPCION }}</div>
                        <div id="publicacion-imagenes" class="publicacion-imagenes">
                            @foreach ( $publicacion->imagenes as $imagen )
                            <div class="inner"  >
                                <img class="img-responsive" src="{{ asset( 'storage/img/fudebiol_imagenes/' . $imagen->FI_ID . '.' . $imagen->FI_FORMATO ) }}" alt="image"   onclick="mostrarFotoSinDescripcion(this);" />
                            </div>  
                            @endforeach        
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
