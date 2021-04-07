@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
            <div class="editor-fondo">
                <div class="editor-mascara">  
                    <h1 class="editor-titulo">Administrar publicaciones
                        <!-- <form id="buscador_publicaciones" accion="{{route('administrarPublicaciones')}}" method="post">
                        <input type="text" name="buscar" placeholder="Buscar un título">
                        <button  class="btn_buscar_publicacion"><i class="fas fa-search"></i></button>
                        </form> -->
                    </h1>
                    <div class="pub_container">
                        @foreach ( $publicaciones as $publicacion )
                        <form accion="{{route('administrar')}}" method="post" class="publicacion-base-adm publicacion-size">
                            @csrf
                            <div class="opciones"> 
                            <i class="fas fa-pen edit-style"></i>
                            <button type="submit" name="eliminar"><i class="fas fa-times delete-style"></i></button>
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
                        </form>
                        @endforeach
                    </div>
                </div>  
            </div>
        </div>
    </div>
@endsection
