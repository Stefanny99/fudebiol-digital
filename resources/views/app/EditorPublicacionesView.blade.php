@extends('layouts.app')

@section('content')
    <script>
        var routes = {
            "agregarImagenesTemporales": "{{ route( 'agregarImagenesTemporales' ) }}",
            "fudebiol_imagenes": "{{ asset( 'storage/img/fudebiol_imagenes' ) }}"
        };
    </script>
    <div id="body_home">
        <div id="contenido">
            <div class="editor-fondo">
                <div class="editor-mascara">  
                    <h1 class="editor-titulo">Editor de publicaciones</h1>
                    <div class="editor-base">
                        <div class="editor-base">
                            <div class="publicacion-base publicacion-base-size">
                                <div class="publicacion-encabezado">
                                    <img class="publicacion-logo" src="{{ asset('/img/logo.jpg')}}">
                                    <div class="titulo-fecha">
                                        <label id="publicacion-titulo"></label>
                                        <label id="publicacion-fecha"></label>
                                    </div>
                                </div>
                                <div id="publicacion-descripcion">
                                    
                                </div>
                                <div id="publicacion-imagenes-1" class="publicacion-imagenes pub">  

                                </div>
                                
                            </div>
                        </div>

                        <!-- pasar este div a form-->
                        <form class="editor-herramientas" action="{{ route( 'guardarPublicacion' ) }}" method="post">
                            @csrf
                            <input type="hidden" name="fp_id" value="{{ $publicacion_id }}">
                            <h4 class="herramientas-titulo"><b>Herramientas de edición</b></h4>
                            <label for="titulo-publicacion" ><b>Título</b></label>
                            <input type="text" id="titulo-publicacion" class="container-style" name="fp_titulo" value="{{ $publicacion ? $publicacion->FP_TITULO : '' }}">
                            <label for="descripcion-publicacion"><b>Descripción</b></label>
                            <textarea class="container-style" id="descripcion-publicacion" name="fp_descripcion">{{ $publicacion ? $publicacion->FP_DESCRIPCION : '' }}</textarea>
                            <label><b>Agrega fotografías</b></label>
                            <label id="agregar-fotos" for="fotos-publicacion" >Agregar fotografías</label>
                            <input type="file" onchange="updateImageChooser(this)" id="fotos-publicacion" multiple="multiple">
                            <div id="imagenes-eliminadas" style="display: none;"></div>
                            <div id="vista-previa-fotos">
                            @if ( $publicacion )
                            @foreach ( $publicacion->imagenes as $imagen )
                            <div class="delete-photo" id="fp-imagen-{{ $imagen->FI_ID }}" data-id="{{ $imagen->FI_ID }}" data-formato="{{ $imagen->FI_FORMATO }}">
                                <i class="fas fa-times" onclick="removePhoto( {{ $imagen->FI_ID }} )"></i>
                                <img class="image-preview" src="{{ asset( 'storage/img/fudebiol_imagenes/' . $imagen->FI_ID . '.' . $imagen->FI_FORMATO ) }}">
                            </div>
                            @endforeach
                            @endif
                            </div>
                            <div class="content-row">
                                <button type="button" id="vista-previa" onclick="vistaPrevia()">Vista previa</button>  
                                <button type="submit" id="guardar-publicacion">Guardar</button>
                            </div>
                        </form>  

                    </div>
                </div>  
            </div>
        </div>
    </div>
@endsection
