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
               
                <div class="row">
                     <div class="inner" id="cajafoto"><img src="/img/large/gm1.jpg" alt="image"  onclick="mostrarFoto(this);" /></div>
                        <div class="inner">
                           <img src="/img/large/gm2.jpg" alt="image" onclick="mostrarFoto(this);" />
                       </div>
                   
                        <div class="inner"><img src="/img/large/gm3.jpg" alt="image" onclick="mostrarFoto(this);" /></div>
                   
                        <div class="inner">
                            <img src="/img/large/gm4.jpg" alt="image"  onclick="mostrarFoto(this);"/>
                      
                        </div>
                 
                  
                        <div class="inner">
                          <img src="/img/large/gm6.jpg" alt="image" onclick="mostrarFoto(this);" /> 
                        </div>
                        <div class="inner">
                           <img src="/img/large/gm1.jpg" alt="image" onclick="mostrarFoto(this);"/>
                      </div>
                   
                        <div class="inner">
                           <img src="/img/large/gm2.jpg" alt="image" onclick="mostrarFoto(this);"/>
                       </div>
                   
                     <div class="inner">
                           
                          <img src="/img/large/gm3.jpg" alt="image" onclick="mostrarFoto(this);" />
                           
                        </div>
                       
                  
                </div>
            
   
      
      </div>
      </div>
    </div>
@endsection
