@extends('layouts.app')

@section('content')
    <div id="body_home" style="overflow: visible; height: auto; min-height: auto; max-height: none;">
        <div id="contenido" style="overflow: visible; height: auto; min-height: auto; max-height: none;">
            <div class="home publicacion-fondo" style="background-attachment: fixed; overflow: visible; height: auto; min-height: auto; max-height: none;">
                @guest
                @else
                @if ( Auth::user()->role == 'S' )
                <a href="{{ route('editorPublicaciones') }}" class="crear-publicacion">Crear una nueva publicación</a>
                <a href="{{ route('administrarPublicaciones', $pagina) }}" class="crear-publicacion">Administrar publicaciones</a>
                @endif
                @endif
                <div id="contenedor-publicaciones" style="overflow: visible; height: auto; min-height: auto; max-height: none;">
                    @foreach ( $publicaciones as $publicacion )
                    <div class="publicacion-base">
                        <div class="publicacion-encabezado">
                            <img class="publicacion-logo" src="{{ asset('/img/logo.jpg') }}">
                            <div class="titulo-fecha">
                                <label class="publicacion-titulo"><b>{{ $publicacion->FP_TITULO }}</b></label>
                                <label class="publicacion-fecha">{{ \Carbon\Carbon::parse($publicacion->FP_FECHA)->format('d/m/Y') }}</label>
                            </div>
                        </div>
                        <pre id="publicacion-descripcion" style="text-align: justify; text-justify: inter-word; white-space: pre-line; word-break: break-word;">{{ $publicacion->FP_DESCRIPCION }}</pre>
                        <div class="publicacion-imagenes">
                            @foreach ( $publicacion->imagenes as $imagen )
                            <div class="inner" id="contenedor-imagen-{{ $imagen->FI_ID }}">
                                <img class="img-responsive" src="{{ asset( 'storage/img/fudebiol_imagenes/' . $imagen->FI_ID . '.' . $imagen->FI_FORMATO ) }}" alt="image" data-id="{{ $imagen->FI_ID }}" onclick="mostrarFoto( this );" />
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
