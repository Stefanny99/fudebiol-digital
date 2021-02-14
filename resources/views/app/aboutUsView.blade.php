@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
            <div id="fondoAboutUs" >
                <div class="tituloAU">
                    <img  src="img/logo.jpg">
                    <label >¿Quiénes somos?</label>
                    </div>
                </div>
            </div>
            <div class="home">
                
               
   
               
               
<div class="carrusel">
<section class="carousel" aria-label="Gallery">
  <ol class="carousel__viewport">
    <li id="carousel__slide1"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper">
      <img class="fotocarrusel" src="{{ asset('/img/av1.png')}}">
         <div>
         <h1>Bienvenido a FUDEBIOL</h1>
                <p>La Fundación para el Desarrollo del Centro Biológico las Quebradas (FUDEBIOL)
                es una organización de carácter social, sin fines de lucro, constituida el 13 de
                mayo de 1989, bajo el marco legal de la Ley de Fundaciones No. 5338 en Costa Rica;
                con el propósito de proteger y conservar los recursos naturales de la Cuenca 
                Superior del Río Quebradas, por el potencial que representa el Bosque Nuboso 
                Tropical Premontano Húmedo de la Cordillera de Talamanca - Sector Pacífico, así 
                como el área de recarga acuífera del acueducto de agua potable que abastece a 
                100.000 habitantes en la Ciudad de San Isidro de El General.
                </p>
         </div>
      </div>
        <a href="#carousel__slide4"
           class="carousel__prev">Go to last slide</a>
        <a href="#carousel__slide2"
           class="carousel__next">Go to next slide</a>
     
    </li>
    <li id="carousel__slide2"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper">
         <img class="fotocarrusel" src="{{ asset('/img/av2.jpg')}}">
         <div>
         <h1>Nuestros objetivos</h1>
                <p>
                Los objetivos de FUDEBIOL están relacionados con la protección del Río 
                Quebradas, mediante la conservación de la biodiversidad, el impulso de
                 actividades de desarrollo sostenible como la agricultura conservacionista, 
                 el ecoturismo y el desarrollo científico; que facilite elevar el nivel de 
                 vida de sus pobladores, en apoyo al proceso de desarrollo de la Región del 
                 Pacífico Sur de Costa Rica.
                </p>
         </div>
        </div>
      <a href="#carousel__slide1"
         class="carousel__prev">Go to previous slide</a>
      <a href="#carousel__slide3"
         class="carousel__next">Go to next slide</a>
    </li>
    <li id="carousel__slide3"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper">
      <img class="fotocarrusel" src="{{ asset('/img/ave22.jpg')}}">
         <div>
         <h1>Ubicación</h1>
         <p>
         El Centro Biológico Las Quebradas, situado a 136 kilómetros al sur
          de San José, es una reserva natural comunal administrada por 
          FUDEBIOL. Se ubica en la cuenca del Río San Isidro cuya altitud 
          esta entre los 1100 y los 2400 m.s.n.m. formando parte de las 
          estribaciones de la Cordillera de Talamanca, sector Pacífico.
          Es un área dedicada a la protección y conservación de los recursos
          naturales, de una enorme riqueza natural de flora y fauna, 
          característica del bosque pluvial premontano húmedo, y donde se 
          localizan las fuentes de agua del acueducto de la Ciudad de San 
           de El General.
         </p>
         </div>
      
</div>
      <a href="#carousel__slide2"
         class="carousel__prev">Go to previous slide</a>
      <a href="#carousel__slide1"
         class="carousel__next">Go to next slide</a>
    </li>
    <!-- <li id="carousel__slide4"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper">
      <img class="fotocarrusel" src="{{ asset('/img/b11.jpg')}}">
         <div>Hola VAMOS A VER SI ESTO SE MUESTRA
            asdfhakjsdhajsd adsf 
            afa forsd getAuthenticatorsForAgentag dfg 
            dafg 
            adfg adf g
            dfg adadfg addgadf get_defined_constantsdfgfag adfga 
            f 
         </div>
      </div>
      <a href="#carousel__slide3"
         class="carousel__prev">Go to previous slide</a>
      <a href="#carousel__slide1"
         class="carousel__next">Go to first slide</a>
    </li> -->
  </ol>
  <aside class="carousel__navigation">
    <ol class="carousel__navigation-list">
      <li class="carousel__navigation-item">
        <a href="#carousel__slide1"
           class="carousel__navigation-button">Go to slide 1</a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide2"
           class="carousel__navigation-button">Go to slide 2</a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide3"
           class="carousel__navigation-button">Go to slide 3</a>
      </li>
      <!-- <li class="carousel__navigation-item">
        <a href="#carousel__slide4"
           class="carousel__navigation-button">Go to slide 4
           </a>
           
      </li> -->
    </ol>
  </aside>
</section>
</div> <!-- carrusel --> 
  
</div> <!-- FIN DE HOME-->
<div id="fondoAboutUs_colaboradores" >
   <div class="tituloAU_colaboradores">
      <label >Nuestros representantes</label>
      <div id="colaboradores">

         <div class="colaborador">
            <img src="{{asset('/img/jorge.png')}}">
            <h4>Jorge Valverde</h4>
            <h5>Presidente de FUDEBIOL</h5>

         </div>

         <div class="colaborador">
            <img src="{{asset('/img/gilberth.jpg')}}">
            <h4>Gilberth Fallas</h4>
            <h5>Vicepresidente de FUDEBIOL</h5>

         </div>

      </div>
   </div>
</div>
</div>
<div class="home"><!--Segundo Home--> 
<h1 id="txt_colaboradores">¡Envíanos tus dudas o comentarios!</h1>
   <img id="flecha" src="{{ asset('/img/felcha.png')}}">
   <div id="caja3">
      <div id="caja2" >
      <form id="caja_comentario">
         <label >Tu correo electrónico:</label>
         <input id="user_correo" type="text">
         <label >Número de teléfono:</label>
         <input id="user_telefono" type="text">
         <label>Tu comentario:</label>
         <textarea id="comentario"></textarea>
         <button id="btn_send">Enviar</button>
      </form>
      </div>
   </div>
</div><!-- cierre Segundo Home-->    
        </div>
    </div>
@endsection
