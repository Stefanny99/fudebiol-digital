@extends('layouts.app')

@section('content')
    <div id="body_home" style="overflow: visible; height: auto; min-height: auto; max-height: none;">
        <div id="contenido" style="overflow: visible; height: auto; min-height: auto; max-height: none;">
            <div class="home publicacion-fondo" style="background-attachment: fixed; overflow: visible; height: auto; min-height: auto; max-height: none;">
                @guest
                @else
                @if ( Auth::user()->role == 'S' )
                <div class="row_container"> 
                    <a href="{{ route('editorPublicaciones') }}" class="crear-publicacion">Crear una nueva publicación</a>
                    <a href="{{ route('administrarPublicaciones', $pagina) }}" class="crear-publicacion">Administrar publicaciones</a>
                </div>
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
                        <pre id="publicacion-descripcion" style="text-align: center; text-justify: inter-word; white-space: pre-line; word-break: break-word;">{{ $publicacion->FP_DESCRIPCION }}</pre>
                        <div class="publicacion-imagenes">
                            @foreach ( $publicacion->imagenes as $imagen )
                            <div class="inner" id="contenedor-imagen-{{ $imagen->FI_ID }}">
                                <img class="img-responsive" src="{{ asset( 'storage/img/fudebiol_imagenes/' . $imagen->FI_ID . '.' . $imagen->FI_FORMATO ) }}" alt="image" data-id="{{ $imagen->FI_ID }}" onclick="mostrarFoto( this );" />
                            </div>  
                            @endforeach        
                        </div>
                    </div>
                   @endforeach
                   <div style="display:flex; align-items: center; justify-content: center">
                        <a class="crear-publicacion" href="{{ route( 'publicaciones', max( 1, $pagina - 1 ) ) }}"> <i class="fas fa-backward"></i> </a>
                        <span style="margin-left:10%; letter-spacing: normal; text-align: center; word-spacing: normal; white-space: nowrap; margin-right: 10%; color:white; font-weight: bold">{{ $pagina }} de {{ $cantidadPaginas }}</span>
                        <a class="crear-publicacion" href="{{ route( 'publicaciones', min( $pagina + 1, $cantidadPaginas ) ) }}"> <i class="fas fa-forward"></i> </a>
                    </div>
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
