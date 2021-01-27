@extends('layouts.app')

@section('content')

    <div id="body_home"> 
      <div id="contenido">
         <div id="fondoGaleria">
          <div id="tituloGaleria" class="container-fluid">
            <label>Galería</label>
          </div>
         </div>
        <div class="home">
               
                <div id="row">
                     <div class="inner"  ><img class="img-responsive" src="/img/fude1.jpg" alt="image"  data-descripcion="Fudebiol te ofrece un espectacular lago donde puedes navegar y estar en paz." onclick="mostrarFoto(this);" /></div>
                        <div class="inner">
                           <img class="img-responsive" src="/img/fude2.jpg" alt="image" data-descripcion="Contamos con distintos espacios para disfrutar en familia." onclick="mostrarFoto(this);" />
                       </div>
                   
                        <div class="inner"><img class="img-responsive"  src="/img/fude3.jpg" data-descripcion="Puedes navegar en nuestro lago, puedes observar la distinta vegetación dentro de ella y los peces." alt="image" onclick="mostrarFoto(this);" /></div>
                   
                        <div class="inner">
                            <img src="/img/fude4.jpg" class="img-responsive"  alt="image" data-descripcion="Un ambiente de paz..."  onclick="mostrarFoto(this);"/>
                      
                        </div>
                 
                  
                        <div class="inner">
                          <img src="/img/fude6.jpg" class="img-responsive"  data-descripcion="Siéntete de la mano con la naturaleza" alt="image" onclick="mostrarFoto(this);" /> 
                        </div>
                        <div class="inner">
                           <img src="/img/fude_banner.jpg" class="img-responsive"  alt="image" data-descripcion="Ún sitio siempre verde.." onclick="mostrarFoto(this);"/>
                      </div>
                   
                        <div class="inner">
                           <img src="/img/fude7.jpg" class="img-responsive"  alt="image"  data-descripcion="Hermosas esculturas..." onclick="mostrarFoto(this);"/>
                       </div>
                   
                     <div class="inner">
                           
                          <img src="/img/fude9.jpg" class="img-responsive"  alt="image" data-descripcion="Disfrutra de la naturaleza con nosotros." onclick="mostrarFoto(this);" />
                           
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
                    <a class="whatsapp contact" href="">
                        <img class="icon img-responsive" src="img/whatsapp.png"></img>
                        <div class="label">7265-9372</div>
                    </a>
                    <span class="email contact">
                        <img class="icon img-responsive" src="img/email.png"></img>
                        <div class="label">fudebiol@gmail.com</div>
                    </span>
                </div>
               
            </div>
        </div>
    </div>
@endsection
