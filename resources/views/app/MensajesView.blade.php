@extends('layouts.app')

@section('content')

    <div id="body_home"> 
        <div id="contenido">
            <div id="fondoMensajes" >
                <div class="titulo tituloMensajes">
                    <img id="logoMAPLV" src="{{ asset('/img/logo.jpg')}}">
                    <label >Mensajería FUDEBIOL Digital</label>
                    <label  id="subText">¡Explora lo que los usuarios opinan de FUDEBIOL!</label>
                    </div>
                </div>
            </div>
            <div class="home">
               <div class="mensajes">
              
                 
                <div class="mascaramensajes">
                <div id="etc">
                       <label>Mensajes no leídos: 23</label>
                       <button id="btn_send" onclick="addMessage()">Eliminar seleccionados</button>
                   </div> 
                <div id="contenedor_mensajes">
               <div class="mesage">
                    <div id="unread"></div>
                    <div class="mesage_mail">
                        <label>De:</label>
                        <label>lizmonge15@gmail.com</label>
                    </div>
                    <div class="phone_mail">
                        <label>Teléfono:</label>
                        <label>85316649</label>
                    </div>
                    <div class="mesage_content">
                        ¡Hola, ¿qué tal?!
                        Pasaba a decirles que este es el mejor sitio del mundo de mundial
                    </div>
                    <label for="leido">Leído</label>
                    <input type="checkbox" id="leido"> 
                    <label for="eliminar">Eliminar</label>
                    <input type="checkbox" id="eliminar">    
                    
               </div>

              
           
               </div>
               </div>
               </div> 
            </div> <!--cierre de home-->
      
        </div>
    </div>
      
        
@endsection
