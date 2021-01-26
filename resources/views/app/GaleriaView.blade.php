@extends('layouts.app')

@section('content')
    <div id="body_home">     
      <div id="contenido">
         <div id="fondoGaleria" >
          <div id="tituloGaleria">
            <label  >Galería</label>
          </div>
         </div>
        <div class="home"></div>
               
                <div id="row">
                     <div class="inner"  ><img  src="/img/fude1.jpg" alt="image"  data-descripcion="Fudebiol te ofrece un espectacular lago donde puedes navegar y estar en paz." onclick="mostrarFoto(this);" /></div>
                        <div class="inner">
                           <img src="/img/fude2.jpg" alt="image" data-descripcion="Contamos con distintos espacios para disfrutar en familia." onclick="mostrarFoto(this);" />
                       </div>
                   
                        <div class="inner"><img src="/img/fude3.jpg" data-descripcion="Puedes navegar en nuestro lago, puedes observar la distinta vegetación dentro de ella y los peces." alt="image" onclick="mostrarFoto(this);" /></div>
                   
                        <div class="inner">
                            <img src="/img/fude4.jpg" alt="image" data-descripcion="Un ambiente de paz..."  onclick="mostrarFoto(this);"/>
                      
                        </div>
                 
                  
                        <div class="inner">
                          <img src="/img/fude6.jpg"  data-descripcion="Siéntete de la mano con la naturaleza" alt="image" onclick="mostrarFoto(this);" /> 
                        </div>
                        <div class="inner">
                           <img src="/img/fude_banner.jpg" alt="image" data-descripcion="Ún sitio siempre verde.." onclick="mostrarFoto(this);"/>
                      </div>
                   
                        <div class="inner">
                           <img src="/img/fude7.jpg" alt="image"  data-descripcion="Hermosas esculturas..." onclick="mostrarFoto(this);"/>
                       </div>
                   
                     <div class="inner">
                           
                          <img src="/img/fude9.jpg" alt="image" data-descripcion="Disfrutra de la naturaleza con nosotros." onclick="mostrarFoto(this);" />
                           
                        </div>
                       
                  
                </div>
            
   
      
      </div>
      </div>
    </div>
@endsection
