@extends('layouts.app')

@section('content')

    <div id="body_home"> 
      <div id="contenido">
         <div id="fondoInfo">
          <div id="tituloInfo" class="container-fluid">
            <img src="/img/png.png">
            <label>ATRACCIONES</label>
          </div>
         </div>
        <div class="home">
               
               <div class="actividades">

                <div class="cajitaInformativa">
                  <h2 class="actividad">Senderismo</h2>
                  <img class=" image_activity img-responsive" src="/img/senderos.png">
                  <label class="explicacion">Senderos en bosque primarios y secundarios</label>
                </div>

                <div class="cajitaInformativa">
                  <h2 class="actividad">Cataratas</h2>
                  <img class="  image_activity img-responsive" src="/img/cataratas.jpg">
                  <label class="explicacion">Gran cantidad de cataratas dentro de nuestra reserva</label>
                </div>

                <div class="cajitaInformativa">
                  <h2 class="actividad">Vistas</h2>
                  <img class="  image_activity img-responsive" src="/img/fude17.jpg">
                  <label class="explicacion">Vistas panorámicas desde el bosque premontano</label>
                </div>

                <div class="cajitaInformativa">
                  <h2 class="actividad">Fauna</h2>
                  <img class="  image_activity img-responsive" src="/img/fauna.png">
                  <label class="explicacion">Avistamiento de aves (más de 175 especies), mamiferos, mariposas e insectos</label>
                </div>

                <div class="cajitaInformativa">
                  <h2 class="actividad">Ambiente</h2>
                  <img class="  image_activity img-responsive" src="/img/fude18.jpg">
                  <label class="explicacion">Jardín sensorial, mariposario y cancha deportiva</label>
                </div>

                <div class="cajitaInformativa">
                  <h2 class="actividad">Hospejade</h2>
                  <img class="  image_activity img-responsive" src="/img/albergue.jpeg">
                  <label class="explicacion">Contamos con un albergue para grupos de hasta 30 personas mas 2 habitaciones individuales con capacidad de 4 personas</label>
                </div>

                <div class="cajitaInformativa">
                  <h2 class="actividad">Escuela</h2>
                  <img class="  image_activity img-responsive" src="/img/escuela.jpg">
                  <label class="explicacion">Escuela de la naturaleza para organización de eventos y ferias</label>
                </div>

                <div class="cajitaInformativa">
                  <h2 class="actividad">Cercanías</h2>
                  <img class="  image_activity img-responsive" src="/img/b3.jpg">
                  <label class="explicacion">Cercanía a playas, ríos y parques nacional del Pacífico Sur de Costa Rica</label>
                </div>
                <div class="cajitaInformativa">
                  <h2 class="actividad">Carrera del agua</h2>
                  <img class="  image_activity img-responsive" src="/img/carrera.jpg">
                  <label class="explicacion">Anualmente realizamos una carrera en honor al agua</label>
                </div>
                <div class="cajitaInformativa">
                  <h2 class="actividad">Lago</h2>
                  <img class="  image_activity img-responsive" src="/img/fude19.jpg">
                  <label class="explicacion">Contamos con un lago en donde puede navegar en bote</label>
                </div>

               </div>
               
            
        </div>
      </div>
      <div id="pie">
                <div class="bottom">
                    <div class="left">
                        &copy; 2021, Lizeth Monge Padilla, Diego Tames Vargas, Stefanny Barrantes Vargas
                    </div>
                <div class="middle">
                    <a class="facebook contact" href="https://www.facebook.com/FUDEBIOL/">
                        <img class="icon img-responsive" src="img/facebook.png"></img>
                        <div class="label">@FUDEBIOL</div>
                    </a>
                    <a class="whatsapp contact" href="https://wa.me/+50689731001">
                        <img class="icon img-responsive" src="{{ asset( 'img/whatsapp.png' ) }}"></img>
                        <div class="label">8973-1001</div>
                    </a>
                    <a class="whatsapp contact">
                        <img class="icon img-responsive" src="{{ asset( 'img/whatsapp.png' ) }}"></img>
                        <div class="label">2771-4131</div>
                    </a>
                    <a class="email contact" href="mailto:fudebiol@gmail.com">
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
