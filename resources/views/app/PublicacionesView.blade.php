@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
            <div class="home publicacion-fondo">
                <div id="contenedor-publicaciones">
                    <div class="publicacion-base">
                        <div class="publicacion-encabezado">
                            <img class="publicacion-logo" src="{{ asset('/img/logo.jpg')}}">
                            <div class="titulo-fecha">
                                <label class="publicacion-titulo"><b>Sembrando esperanza</b></label>
                                <label class="publicacion-fecha">17 de febrero, 2020</label>
                            </div>
                        </div>
                        <div class="publicacion-descripcion">
                        Puedes venir a meditar y caminar en nuestras plataformas o simplemente.
                        respirar aire fresco, recuerda que ahora abrimos de 7am a 3pm, sábados 
                        y domingos. Los esperamos!
                        </div>
                        <div id="publicacion-imagenes">
                            <div class="inner"  >
                                <img class="img-responsive" src="/img/fude1.jpg" alt="image"   onclick="mostrarFotoSinDescripcion(this);" />
                            </div>
                            <div class="inner">
                                <img class="img-responsive" src="/img/fude2.jpg" alt="image" onclick="mostrarFotoSinDescripcion(this);" />
                            </div>
                            
                            <div class="inner">
                                <img class="img-responsive"  src="/img/fude3.jpg"  alt="image" onclick="mostrarFotoSinDescripcion(this);" />
                            </div>       
                        </div>
                        
                    </div>
                    <div class="publicacion-base">
                        <div class="publicacion-encabezado">
                            <img class="publicacion-logo" src="{{ asset('/img/logo.jpg')}}">
                            <div class="titulo-fecha">
                                <label class="publicacion-titulo"><b>Sembrando esperanza</b></label>
                                <label class="publicacion-fecha">17 de febrero, 2020</label>
                            </div>
                        </div>
                        <div class="publicacion-descripcion">
                        Puedes venir a meditar y caminar en nuestras plataformas o simplemente.
                        respirar aire fresco, recuerda que ahora abrimos de 7am a 3pm, sábados 
                        y domingos. Los esperamos!
                        </div>
                        <div id="publicacion-imagenes">
                            <div class="inner"  >
                                <img class="img-responsive" src="/img/fude4.jpg" alt="image"   onclick="mostrarFotoSinDescripcion(this);" />
                            </div>
                            <div class="inner">
                                <img class="img-responsive" src="/img/fude7.jpg" alt="image" onclick="mostrarFotoSinDescripcion(this);" />
                            </div>
                            
                            <div class="inner">
                                <img class="img-responsive"  src="/img/fude6.jpg"  alt="image" onclick="mostrarFotoSinDescripcion(this);" />
                            </div>       
                        </div>
                        
                    </div>
                    <div class="publicacion-base">
                        <div class="publicacion-encabezado">
                            <img class="publicacion-logo" src="{{ asset('/img/logo.jpg')}}">
                            <div class="titulo-fecha">
                                <label class="publicacion-titulo"><b>Sembrando esperanza</b></label>
                                <label class="publicacion-fecha">17 de febrero, 2020</label>
                            </div>
                        </div>
                        <div class="publicacion-descripcion">
                        Puedes venir a meditar y caminar en nuestras plataformas o simplemente.
                        respirar aire fresco, recuerda que ahora abrimos de 7am a 3pm, sábados 
                        y domingos. Los esperamos!
                        </div>
                        <div id="publicacion-imagenes">
                            <div class="inner"  >
                                <img class="img-responsive" src="/img/b11.jpg" alt="image"   onclick="mostrarFotoSinDescripcion(this);" />
                            </div>
                            <div class="inner">
                                <img class="img-responsive" src="/img/b10.jpg" alt="image" onclick="mostrarFotoSinDescripcion(this);" />
                            </div>
                            
                            <div class="inner">
                                <img class="img-responsive"  src="/img/b8.jpg"  alt="image" onclick="mostrarFotoSinDescripcion(this);" />
                            </div>       
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
