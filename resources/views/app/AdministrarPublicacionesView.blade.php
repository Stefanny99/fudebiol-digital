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
                            <div class="publicacion-encabezado pub_2">
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
                    <div id="paginacion">
                        <a class="btn_pagRL" href=" {{ route( 'administrarPublicaciones', max( 1, $pagina - 1 ) ) }}?buscar={{ $buscar }}"> <i class="fas fa-backward"></i> </a>
                        <span style="letter-spacing: normal; text-align: center; word-spacing: normal; white-space: nowrap; margin-right: 10%; color:white; font-weight: bold">{{ $pagina }} de {{ $cantidadPaginas }}</span>
                        <a class="btn_pagRL" href="{{ route( 'administrarPublicaciones', min( $pagina + 1, $cantidadPaginas ) ) }}?buscar={{ $buscar }}" > <i class="fas fa-forward"></i> </a>
                    </div>
                </div>  
            </div>
        </div>
    </div>
@endsection
