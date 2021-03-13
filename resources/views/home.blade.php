@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido" >
            <div class="banner">
                <div id="banner_mascara" class="container-fluid">
                    <div id="banner_texto" class="container-fluid">
                        <img src="{{ asset( '/img/arboles.png' ) }}" class="img-responsive">
                        <label id="fudebiol" class="container-fluid">FUDEBIOL</label>
                        <label id="centrobiol" class="container-fluid">CENTRO BIOLÓGICO LAS QUEBRADAS</label>
                    </div>
                </div>
            </div>
            <div class="home">
                <!-- -------------------------------------------------------------------------------------------- -->
                <div style="height: 400px; width: 700px">
                    <div id="mapid" style="height: 400px; width: 700px; z-index: 10"></div>
                </div>
                <script>
                // var lat = 9+(26/60)+(35.5/3600);
                // var long = -(83+(41/60)+(31.1/3600));
                var lat = 9.3733942;
                var long = -83.701957;
                    var mymap = L.map('mapid').setView([lat, long], 16);
                    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                        minZoom: 2,
                        maxZoom: 20,
                        // subdomains:['mt0','mt1','mt2','mt3'],
                        attribution:
                            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(mymap);
                    const mIcon = L.icon({
                    iconUrl: 'img/lote.png',
                    iconSize: [35, 35],
                    });
                    var marker = new L.Marker([this.lat, this.long], { draggable: true, icon: mIcon });
                    mymap.addLayer(this.marker);
                    var popup = L.popup().setContent(lat + " , " + long);

                    marker.bindPopup(popup).openPopup();
                    marker.on('dragend', function (e) {
                        lat = marker.getLatLng().lat;
                        long = marker.getLatLng().lng;
                        console.log(marker.getLatLng().lat, marker.getLatLng().lng);
                    });
                </script> 
                <!-- -------------------------------------------------------------------------------------------- -->
                <div class="seccion" >
                <label class="welcome_left">Bienvenidos a FUDEBIOL</label>
                <div class="subseccion">
                     <div id="home_texto">El Centro Biológico Las Quebradas, situado a 136 kilómetros al sur de San José, es una reserva natural comunal administrada por FUDEBIOL. Se ubica en la cuenca del Río San Isidro cuya altitud esta entre los 1100 y los 2400 m.s.n.m. formando parte de las estribaciones de la Cordillera de Talamanca, sector Pacífico.

                        Es un área dedicada a la protección y conservación de los recursos naturales, de una enorme riqueza natural de flora y fauna, característica del bosque pluvial premontano húmedo, y donde se localizan las fuentes de agua del acueducto de la Ciudad de San Isidro de El General.</div>
                        <img class="img_izquierda img-responsive" src="{{ asset( '/img/fudehome.jpg' ) }}">
                    </div>
                </div>
                <div class="seccion">
                <label class="welcome_right">Educación</label>
                <div class="subseccion">
                    <img class="img_derecha img-responsive" src="{{ asset( '/img/educacion.jpg' ) }}">
                     <div id="home_texto" class="container-fluid">FUDEBIOL desarrolla una agenda anual de actividades de educación ambiental, dirigidas a diferentes sectores de la población de la Cuenca del Río Quebradas y del Valle de El General interesadas en impulsar acciones de formación en desarrollo sostenible, con un especial énfasis en los niños y estudiantes, entre ellas la Feria del Agua que se realiza en el mes de marzo. El propósito de la educación ambiental es concienciar sobre la biodiversidad y el recurso hídrico del área, aplicar el Plan de Manejo y Ordenamiento Territorial de la cuenca y potenciar los esfuerzos de estudios, investigaciones ambientales, proyectos productivos sostenibles; con el fin de aprender a enfrentar el futuro, sin cometer los errores generados contra los recursos naturales en el pasado. </div>
                </div>
              
                   
               
                
                </div>

                 <div class="seccion" >
                <label class="welcome_left">Voluntariado e Intercambio Cultural</label>


                <div class="subseccion">
                     <div id="home_texto" class="container-fluid">El Centro Biológico Las Quebradas, recibe en toda la época del año voluntarios en forma individual o en grupos, en las modalidades de ECOVOLUNTARIOS e INTERCAMBIO CULTURAL. Los interesados en cooperar en la protección y conservación de los recursos naturales de la Cuenca del Río Quebradas, pueden disfrutar de la amplia diversidad de flora y fauna característica del bosque pluvial premontano húmedo y  convivir en una comunidad rural, con familias amables y de buenas costumbres.</div>
                    <img class="img_izquierda img-responsive" src="{{ asset( '/img/voluntariado.jpg' ) }}">
                </div>
               
                </div>

                <div class="seccion">
                    <label class="welcome_right">Nuestro entorno</label>
                    <div class="subseccion">
                        <img class="img_derecha img-responsive" src="{{ asset( '/img/entorno.jpg' ) }}">
                        <div id="home_texto" class="container-fluid">Usted puede disfrutar de cientos de atracciones al rededor de esta reserva natural. Se encuentra a tan solo 15 minutos de la ciudad de San Isidrio de El General donde hay acceso a todos los productos y servicios necesarios.

                    En la comunidad de Quebradas puede encontrar personas dedicadas a los agronegocios, agro turismo, alquiler de caballos, entre otras actividades que puede realizar además de visitar el Centro Biológico. </div>
                    </div>
                   
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
@endsection
