@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
            <div id="fondoVisualizadorArboles">
           <div id="textovs">
            <img id="logovs" src="img/vsa.png" >
            <label>Visualizador de árboles</label>
          </div>
        </div>
        <div class="home">
          <div id="disponibilidad"> 
          <label id="libre">Libre:</label>
           <img class="arbolVW" style="background-color: green;" src="img/lote.png">
          
           <label id="adoptado">Adoptado:</label>
           <img class="arbolVW" style="background-color: red;" src="img/lote.png">
         </div> 
         <div id="caja">
         
          <div id="cajaLote">
            <div id="treeheadervs">
              <div id="treeheadermascaravs"  class="container-fluid">
                 <label id="RegArbol">Selecciona un </label>
                 <label>lote</label>
              </div>
            </div>
           
          <div id="lotes">
             <div class="lote">
                 <label>LA</label><img src="/img/palo.png"></i>
              </div>

               <div class="lote">
                 <label>LB</label><img src="/img/palo.png"></i>
              </div>

               <div class="lote">
                 <label>LC</label><img src="/img/palo.png"></i>
              </div>

               <div class="lote">
                 <label>LD</label><img src="/img/palo.png"></i>
              </div>

               <div class="lote">
                 <label>LE</label><img src="/img/palo.png"></i>
              </div>
               <div class="lote">
                 <label>LF</label><img src="/img/palo.png"></i>
              </div>
           
          </div>

          </div>  
           <div id="VisualizacionArboles">
            <div id="mascara">
                 <div>
        <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
         <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
         
            </div>
             <div>
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
         
            </div>
         
             <div>
        <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
         <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
         
            </div>
             <div>
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW adoptado" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
          <img class="arbolVW disponible" src="img/lote.png">
         
            </div>
          
            </div>
            

           </div>

          
            <div id="cajaLote">
           
            <label id="RegArbol">Información del árbol</label>
             <img id="arbolInfo" src="img/pino.jpg">
             <div id="datosArbol">
            <label class="texto">Especie: Pino</label>
           
            <label class="texto" for="tamaño">Coordenada N: 195°</label>

            <label class="texto" for="filas">Coordenada W: 65°</label>
           

            <label class="texto" for="columnas">Fila: 29</label>
            

            <label class="texto" for="columnas">Columna: 4</label>
            
            </div>
            <button class="btn_adoptar">Adoptar</button>

          </div> 
          
          </div>

       </div>
         
          
        </div>
        </div>
    </div>
@endsection
