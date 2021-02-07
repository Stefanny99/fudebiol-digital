@extends('layouts.app')
@section('content')
    <div id="body_home">     
      <div id="contenido">
        <div id="fondoRL" >
          <div class="titulo tituloRL">
              <img id="logoMAPLV" src="img/maplv.png">
              <label >Registro de lotes</label>
              <label  id="subText">La madre tierra nos premia con tantas maravillas ¡Vamos a echarle una mano!</label>
            </div>
          </div>
        </div>
        
        <div class="home">
        
         <div id="caja"> 

          <form id="cajaArbolRL" class="hvr-float">
            <div id="treeheaderRL">
              <div id="treeheadermascaraRL" class="container-fluid">
               <label id="RegArbol">Registra un nuevo </label>
               <label>lote</label>
               </div>
             </div>
            
            <label class="texto" for="codigo">Código:</label>
            <input type="text" name="codigo">

            <label class="texto" for="tamaño">Tamaño:</label>
            <input type="text" name="tamaño">

            <label class="texto" for="filas">Cantidad de filas:</label>
            <input type="text" name="filas">

            <label class="texto" for="columnas">Cantidad de columnas:</label>
            <input type="text" name="columnas">

            <div id="botonRL">
              <button class="btn_registrarRL">Registrar</button>
            </div>
          </form> 

            <div id="tabla" class="hvr-forward container-fluid">
            <form id="buscador" accion="{{route('registrarPadrino')}}" method="post">
                <input type="text" name="buscar" placeholder="Buscar un lote">
                <button  class="btn_buscarRL"><i class="fas fa-search"></i></button>
            </form>
              <table id="tablaArbolesRL">
                <thead>
                <tr id="tablehead" >
                  <th>Código</th>
                  <th>Tamaño</th>
                  <th>Filas</th>
                  <th>Columnas</th>
                  <th>Acción</th>
                  
                </tr>
                 </thead> 
              <tbody>
               
                <tr class="fila">
                  <td class="fila">L01</td>
                  <td class="fila">124</td>
                  <td class="fila">34</td>
                  <td class="fila">17</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                       <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                    </td>
                </tr>
               
                <tr class="fila">
                  <td class="fila">L01</td>
                  <td class="fila">124</td>
                  <td class="fila">34</td>
                  <td class="fila">17</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                       <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                    </td>
                </tr>
                
                <tr class="fila">
                  <td class="fila">L01</td>
                  <td class="fila">124</td>
                  <td class="fila">34</td>
                  <td class="fila">17</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                       <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                    </td>
                </tr>
                
                <tr class="fila">
                  <td class="fila">L01</td>
                  <td class="fila">124</td>
                  <td class="fila">34</td>
                  <td class="fila">17</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                       <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                    </td>
                </tr>
                
                <tr class="fila">
                  <td class="fila">L01</td>
                  <td class="fila">124</td>
                  <td class="fila">34</td>
                  <td class="fila">17</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                       <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                    </td>
                </tr>
                
                <tr class="fila">
                  <td class="fila">L01</td>
                  <td class="fila">124</td>
                  <td class="fila">34</td>
                  <td class="fila">17</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                       <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                    </td>
                </tr>
              </tbody>
            </table>
            <div id="botonesEdicionArbolesRL">
                <button class="btn_arbolesRL"><i class="far fa-save"></i></button>
                <div id="paginacion">
                  <a class="btn_pagRL" href=" {{ route('registrarPadrino' )}}"> <i class="fas fa-backward"></i> </a>
                  <a class="btn_pagRL" href="{{ route('registrarPadrino')}}" > <i class="fas fa-forward"></i> </a>
                </div>
            </div>
          </div>
          </div>
        </div>      
        </div>
    </div>
@endsection
