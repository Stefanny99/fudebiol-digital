@extends('layouts.app')

@section('content')

    <div id="body_home"> 
        <div id="contenido">
            <div id="fondoMensajes" >
                <div class="titulo tituloNotificaciones">
                    <img id="logoMAPLV" src="{{ asset('/img/MAPLV.png')}}">
                    <label >Notificaciones de adopciones</label>
                    <label  id="subText">¡Alguien se ha unido a la familia de mi árbol para la vida!</label>
                    </div>
                </div>
            </div>
            <div class="home">
               <div class="mensajesN">
              
                 
                <div class="mascaramensajesN">
                <div id="etcN">
                       <label>Nuevas adopciones: 12</label>
                       <button id="btn_send" onclick="addNotification()">Eliminar seleccionados</button>
                   </div> 
                <div id="contenedor_mensajesN">
               <div class="mesageN">
                    <div id="unreadN"></div>
                    <div class="mesage_contentN">
                        <H2>¡Hay una nueva adopción!</H2>
                    </div>
                    <div class="mesage_data">
                        <label><b>A nombre de:</b></label>
                        <label>Lizeth Monge Padilla</label>
                        <label><b>&nbspCédula:</b></label>
                        <label>117560371</label>
                        <label><b>&nbspDel árbol:</b></label>
                        <label>L1B13</label>
                        <label><b>Especie:</b></label>
                        <label>Guayabo</label>
                        <label><b>&nbspCoordenada W:</b></label>
                        <label>55"43"56</label>
                        <label><b>&nbspCoordenada N:</b></label>
                        <label>55"78"56</label>
                    </div>
                   
                    
                    <label for="leidoN">Leído</label>
                    <input type="checkbox" id="leidoN"> 
                    <label for="eliminarN">Eliminar</label>
                    <input type="checkbox" id="eliminarN">    
                    
               </div>

              
           
               </div>
               </div>
               </div> 
            </div> <!--cierre de home-->
      
        </div>
    </div>
      
        
@endsection
