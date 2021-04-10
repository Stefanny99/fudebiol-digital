@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
            <div class="editor-fondo">
                <div class="editor-mascara">  
                    <h1 class="editor-titulo">Administrar publicaciones
                        <form id="buscador_publicaciones" action="{{route( 'administrarPublicaciones', $pagina )}}" method="get">
                            <input type="text" name="buscar" placeholder="Buscar un título" value="{{ $buscar }}">
                            <button  class="btn_buscar_publicacion"><i class="fas fa-search"></i></button>
                        </form>
                    </h1>
                    <div class="pub_container">
                        @foreach ( $publicaciones as $publicacion )
                        <div class="publicacion-base-adm publicacion-size">
                            <div class="opciones"> 
                            <a href="{{ route('editorPublicaciones').'?fp_id='.$publicacion->FP_ID }}"><i class="fas fa-pen edit-style"></i></a>
                            <a href="{{ route('eliminarPublicacion').'?fp_id='.$publicacion->FP_ID }}"><i class="fas fa-times delete-style"></i></a>
                            </div>
                            <div class="publicacion-encabezado">
                                <img class="publicacion-logo publicacion-logo-size" src="{{ asset('/img/logo.jpg')}}">
                                <div class="titulo-fecha titulo-fecha-size">
                                    <label id="publicacion-titulo" class="publicacion-titulo-size">{{ $publicacion->FP_TITULO }}</label>
                                    <label id="publicacion-fecha">{{ \Carbon\Carbon::parse($publicacion->FP_FECHA)->format('d/m/Y') }}</label>
                                </div>
                            </div>
                            <div id="publicacion-descripcion">
                            </div>
                            <div id="publicacion-imagenes-1" class="publicacion-imagenes">  
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>  
            </div>
        </div>
    </div>
@endsection
