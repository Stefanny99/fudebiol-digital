@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
            <div id="fondoMAPLV" >
                <div class="titulo tituloMAPLV">
                    <img id="logoMAPLV" src="{{ asset( 'img/maplv.png' ) }}">
                    <label >MI ÁRBOL PARA LA VIDA</label>
                    <a href="#salto" id="jumpTo">Adoptar un árbol</a>
                </div>
            </div>
            <div class="home">
            
                <div class="seccionAV">
                    
                    <div class="subseccionAV">
                        <img class="img_derechaAV img-responsive" src="{{ asset( '/img/b1.jpg' ) }}">
                        <div id="home_textoAV" class="container-fluid">
                            <label class="welcome_right">¿Qué es mi árbol para la vida?</label>
                            <p class="contenidotextual"> El proyecto consiste en la reforestación
                                 de un área de 3 has. de pastos, en una de las propiedades de Fudebiol,
                                  con la siembra de 25 especies de árboles nativos. Estos se dan en 
                                  adopción a personas, empresas u organizaciones, quienes pagan 50$ por 
                                  una sola vez, por árbol adoptado; los recursos se manejan en un fondo
                                   especial, para el mantenimiento del proyecto y la adquisición de nuevas
                                    áreas para seguir ampliando la compra de tierras para protección de los 
                                    recursos naturales de la cuenca del Río Quebradas
                            </p> 
                        </div>
                    </div>
                       
                </div>
                <div class="seccionAV" >
                   <div class="subseccionAV">
                   <img class="img_izquierdaAV1 img-responsive" src="{{ asset( '/img/b2.jpg' ) }}">
                            
                        <div id="home_textoAV" class="container-fluid">
                            <label class="welcome_left">¿Cuál es el objetivo de este proyecto?</label>
                            <p class="contenidotextual"> Crear un fondo para la compra de
                                 tierras, con el fin de regenerar las áreas degradadas de la
                                  micro cuenca del río Quebradas.
                            </p>      
                        </div>
                            <img class="img_izquierdaAV img-responsive" src="{{ asset( '/img/b2.jpg' ) }}">
                            
                        
                        
                    </div>
                    
                </div>
                <div class="seccionAV">
                    <div class="subseccionAV">
                        <img class="img_derechaAV img-responsive" src="{{ asset( '/img/b3.jpg' ) }}">
                        <div id="home_textoAV" class="container-fluid">
                            <label class="welcome_right">Beneficios al adoptar un árbol</label>
                            <p class="contenidotextual"> 
                                <label><i class="fab fa-pagelines"></i> Disminución de la erosión. </label>    
                                <label><i class="fab fa-pagelines"></i> Reintegración de especies de flora de alto valor.</label>   
                                <label><i class="fab fa-pagelines"></i> Protección y hospedaje a especies de micro y   macro fauna y flora.</label>   
                                <label><i class="fab fa-pagelines"></i> Embellecimiento del paisaje.</label>   
                                <label><i class="fab fa-pagelines"></i> Disminución de riesgo a desastres.</label>   
                                <label><i class="fab fa-pagelines"></i> Captura de las aguas de lluvia.</label>   
                                <label><i class="fab fa-pagelines"></i> Captura de CO2, contribuyendo a la mitigación del calentamiento Global.</label>   
                            </p>
                        </div>
                    </div>
                </div>
                
                <h1 id="tituloGal">Sé parte de nosotros</h1>
                 <!--galeriaMIni -->
                 <div id="row">
                    
                    <div class="inner" id="contenedor-imagen-1">
                    <img class="img-responsive" src="{{ asset( '/img/b10.jpg' ) }}" alt="image" data-id="1" onclick="mostrarFoto(this);" />
                    </div>
                    
                    <div class="inner" id="contenedor-imagen-2">
                        <img src="{{ asset( '/img/b12.jpg' ) }}" class="img-responsive" data-id="2" alt="image" onclick="mostrarFoto(this);" /> 
                    </div>
                    <div class="inner" id="contenedor-imagen-3">
                        <img src="{{ asset( '/img/b13.jpg' ) }}" class="img-responsive"  alt="image" data-id="3" onclick="mostrarFoto(this);"/>
                    </div>
                    <div class="inner" id="contenedor-imagen-4">
                        <img src="{{ asset( '/img/b14.jpg' ) }}" class="img-responsive"  alt="image" data-id="4"  onclick="mostrarFoto(this);"/>
                    </div>
                </div>
            
             </div> <!--cierre de home -->
             <a name="salto" id="salto"></a>
            <div id="instrucciones" >
                <div class="titulo tituloMAPLV">
                    <br><label >¿Comó apadrinar uno de nuestros árboles?</label><br>
                </div>
            </div>
            <div class="home">
            
                <div class="instruccion">
                    <div class="directrices d1">
                         <i class="fas fa-users"></i>
                        <h1>Paso 1</h1>
                        <p>Regístrate como un padrino.</p>
                        <a href="{{route('editarPadrino')}}">Registrarme</a>
                    </div>
                    <div  class="directrices d2">
                        <i class="fab fa-pagelines"></i>
                        <h1>Paso 2</h1>
                        <p>Mira los árboles disponibles en nuestros lotes</p>
                        <a href="{{route('arboles')}}">Ver árboles</a>
                    </div>
                    <div  class="directrices d3">
                        <i class="fas fa-hand-pointer"></i>
                        <h1>Paso 3</h1>
                        <p>Selecciona el árbol y adóptalo</p>
                        
                    </div>
                    <div  class="directrices d4">
                        <i class="fas fa-certificate"></i>
                        <h1>Paso 4</h1>
                        <p>Después de dar tu contribución se te enviará el certificado de apadrinado</p>
                        
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
                        <div class="label">7265-9372</div>
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
