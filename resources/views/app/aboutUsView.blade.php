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
    <!-- <li id="carousel__slide3"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper">
      <img class="fotocarrusel" src="{{ asset('/img/b11.jpg')}}">
         <div>Hola jdfhgsjd fsdgf hjgsdjhf gsdg fsdgffsdhjfg sdhjfg
             sdgvfhsdgfhjgsdf sdf 
             ds get_defined_constantsdfg dfg dfg
         </div>
      </div>
      <a href="#carousel__slide2"
         class="carousel__prev">Go to previous slide</a>
      <a href="#carousel__slide4"
         class="carousel__next">Go to next slide</a>
    </li> -->
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
      <!-- <li class="carousel__navigation-item">
        <a href="#carousel__slide3"
           class="carousel__navigation-button">Go to slide 3</a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide4"
           class="carousel__navigation-button">Go to slide 4
           </a>
           
      </li> -->
    </ol>
  </aside>
</section>
</div> <!-- carrusel --> 
</div> <!-- FIN DE HOME-->
            
        </div>
    </div>
@endsection
