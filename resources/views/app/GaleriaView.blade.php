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
                     <div class="inner"  ><img  src="/img/large/gm1.jpg" alt="image"  data-descripcion="hola bubu0" onclick="mostrarFoto(this);" /></div>
                        <div class="inner">
                           <img src="/img/large/gm2.jpg" alt="image" data-descripcion="hola bubu1" onclick="mostrarFoto(this);" />
                       </div>
                   
                        <div class="inner"><img src="/img/large/gm3.jpg" data-descripcion="hola bubu2" alt="image" onclick="mostrarFoto(this);" /></div>
                   
                        <div class="inner">
                            <img src="/img/large/gm4.jpg" alt="image" data-descripcion="hola bubu3"  onclick="mostrarFoto(this);"/>
                      
                        </div>
                 
                  
                        <div class="inner">
                          <img src="/img/large/gm5.jpg"  data-descripcion="hola bubu4" alt="image" onclick="mostrarFoto(this);" /> 
                        </div>
                        <div class="inner">
                           <img src="/img/large/gm6.jpg" alt="image" data-descripcion="hola bubu5" onclick="mostrarFoto(this);"/>
                      </div>
                   
                        <div class="inner">
                           <img src="/img/large/gm7.jpg" alt="image"  data-descripcion="hola bubu6" onclick="mostrarFoto(this);"/>
                       </div>
                   
                     <div class="inner">
                           
                          <img src="/img/large/gm8.jpg" alt="image" data-descripcion="hola bubu7" onclick="mostrarFoto(this);" />
                           
                        </div>
                       
                  
                </div>
            
   
      
      </div>
      </div>
    </div>
@endsection
