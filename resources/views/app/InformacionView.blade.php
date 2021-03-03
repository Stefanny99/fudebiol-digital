@extends('layouts.app')

@section('content')

    <div id="body_home"> 
      <div id="contenido">
         <div id="fondoInfo">
          <div id="tituloInfo" class="container-fluid">
            <img src="/img/png.png">
            <label>Atracciones</label>
          </div>
         </div>
        <div class="home">
               
               <div class="actividades">

                <div class="cajitaInformativa">
                  <i class="fas fa-hiking"></i>
                  <label class="actividad">Senderismo</label>
                   <label class="explicacion">Senderos en bosque primarios y secundarios</label>
                </div>



                <div class="cajitaInformativa">
                  <i class="fas fa-water"></i>
                  <label class="actividad">Cataratas</label>
                   <label class="explicacion">Gran cantidad de cataratas</label>
                </div>


                <div class="cajitaInformativa">
                 <i class="fas fa-binoculars"></i>
                  <label class="actividad">Vistas</label>
                   <label class="explicacion">Vistas panorámicas desde el bosque premontano</label>
                </div>

                <div class="cajitaInformativa">
                  <i class="fas fa-crow"></i>
                  <label class="actividad">Fauna</label>
                   <label class="explicacion">Avistamiento de aves (más de 175 especies), mamiferos, mariposas e insectos</label>
                </div>

                <div class="cajitaInformativa">
                  <i class="fas fa-seedling"></i>
                  <label class="actividad">Ambiente</label>
                   <label class="explicacion">Jardín sensorial, mariposario y cancha deportiva</label>
                </div>

                <div class="cajitaInformativa">
                  <i class="fas fa-tram"></i>
                  <label class="actividad">Andarivel</label>
                   <label class="explicacion">Andarivel donde podrá admirar la belleza del bosque tropical desde las alturas</label>
                </div>

                <div class="cajitaInformativa">
                  <i class="fas fa-school"></i>
                  <label class="actividad">Escuela</label>
                   <label class="explicacion">Escuela de la naturaleza para organización de eventos y ferias</label>
                </div>

                <div class="cajitaInformativa">
                 <i class="fas fa-umbrella-beach"></i>
                  <label class="actividad">Cercanías</label>
                   <label class="explicacion">Cercanía a playas, ríos y parques nacional del Pacífico Sur de Costa Rica</label>
                </div>

               </div>
               
            
        </div>
      </div>
    </div>
       <div id="pie">
            <div class="bottom">
                <div class="left">
                    <img class="icon img-responsive" src="img/vector.png"></img>
                    <div class="sitename">&copy;FUDEBIOL</div>
                </div>
                <div class="middle">
                    <a class="facebook contact" href="https://www.facebook.com/FUDEBIOL/">
                        <img class="icon img-responsive" src="img/facebook.png"></img>
                        <div class="label">@FUDEBIOL</div>
                    </a>
                    <a class="whatsapp contact" href="https://wa.me/+50672659372">
                        <img class="icon img-responsive" src="img/whatsapp.png"></img>
                        <div class="label">7265-9372</div>
                    </a>
                    <a class="email contact" href="mailto:udebiol@gmail.com">
                        <img class="icon img-responsive" src="img/email.png"></img>
                        <div class="label">fudebiol@gmail.com</div>
                    </a>
                </div>
               
            </div>
        </div>
    </div>
@endsection
