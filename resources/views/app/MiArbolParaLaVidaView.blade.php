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
                            <p class="contenidotextual"> La fundación para el desarrollo biológico de las quebradas FUDEBIOL de Pérez Zeledón,
                            desde el 2012 trabaja el proyecto "mi árbol para la vida" el cual consite en la reforestación
                            de árboles para ayudar a nuestro medio ambiente.
                            </p> 
                        </div>
                    </div>
                       
                </div>
                <div class="seccionAV" >
                   <div class="subseccionAV">
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
                    
                    <div class="inner">
                    <img class="img-responsive" src="{{ asset( '/img/b10.jpg' ) }}" alt="image" data-descripcion="Sembramos estos árboles con todo el corazón por un mejor mundo." onclick="mostrarFoto(this);" />
                    </div>
                    
                    <div class="inner">
                        <img src="{{ asset( '/img/b12.jpg' ) }}" class="img-responsive"  data-descripcion="Siéntete de la mano con la naturaleza" alt="image" onclick="mostrarFoto(this);" /> 
                    </div>
                    <div class="inner">
                        <img src="{{ asset( '/img/b13.jpg' ) }}" class="img-responsive"  alt="image" data-descripcion="Ún sitio siempre verde.." onclick="mostrarFoto(this);"/>
                    </div>
                    <div class="inner">
                        <img src="{{ asset( '/img/b14.jpg' ) }}" class="img-responsive"  alt="image" data-descripcion="Un ambiente de paz..."  onclick="mostrarFoto(this);"/>
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
                        <a href="{{route('registrarPadrino')}}">Registrarme</a>
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
        </div>
    </div>
@endsection
