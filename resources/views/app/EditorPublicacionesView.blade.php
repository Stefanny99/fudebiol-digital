@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
            <div class="publicacion-fondo">
              <h1 class="editor-titulo">EDITOR DE PUBLICACIONES</h1>
              <div class="editor-base">
              
                    <div class="publicacion-base publicacion-base-size">
                        <div class="publicacion-encabezado">
                            <img class="publicacion-logo" src="{{ asset('/img/logo.jpg')}}">
                            <div class="titulo-fecha">
                                <label id="publicacion-titulo"></label>
                                <label class="publicacion-fecha">17 de febrero, 2020</label>
                            </div>
                        </div>
                        <div id="publicacion-descripcion">
                            
                        </div>
                        <div id="publicacion-imagenes-1" class="publicacion-imagenes">  

                        </div>
                        
                    </div>

            <!-- pasar este div a form-->
                <div class="editor-herramientas">
                  <h4 class="herramientas-titulo"><b>Herramientas de edición</b></h4>
                  <label for="titulo-publicacion" ><b>Título</b></label>
                  <input type="text" id="titulo-publicacion" class="container-style">
                  <label for="descripcion-publicacion"><b>Descripción</b></label>
                  <textarea class="container-style" id="descripcion-publicacion"></textarea>
                  <label><b>Agrega fotografías</b></label>
                  <label id="agregar-fotos" for="fotos-publicacion" >Agregar fotografías</label>
                  <input type="file" id="fotos-publicacion" multiple="multiple"> 
                  <div id="vista-previa-fotos">
                  </div>
                  <button id="vista-previa" onclick="vistaPrevia()">Vista previa</button>
                  <button id="guardar-publicacion">Guardar publicación</button>
                </div>  

              </div>

                 </div>
        </div>
    </div>
@endsection
