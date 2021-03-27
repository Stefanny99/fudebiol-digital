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
                        <form class="editor-herramientas">
                            <h4 class="herramientas-titulo"><b>Herramientas de edición</b></h4>
                            <label for="titulo-publicacion" ><b>Título</b></label>
                            <input type="text" id="titulo-publicacion" class="container-style" name="fp_titulo">
                            <label for="descripcion-publicacion"><b>Descripción</b></label>
                            <textarea class="container-style" id="descripcion-publicacion" name="fp_descripcion"></textarea>
                            <label><b>Agrega fotografías</b></label>
                            <label id="agregar-fotos" for="fotos-publicacion" >Agregar fotografías</label>
                            <input type="file" onchange="updateImageChooser(this)" id="fotos-publicacion" multiple="multiple"> 
                            
                            <div id="vista-previa-fotos">
                            </div>
                            <div class="content-row">
                                <button type="button" id="vista-previa" onclick="vistaPrevia()">Vista previa</button>  
                                <button type="button" id="guardar-publicacion" onclick="guardarPublicacion()">Guardar</button>
                            </div>
                        </form>  

                    </div>
                </div>  
            </div>
        </div>
    </div>
@endsection
