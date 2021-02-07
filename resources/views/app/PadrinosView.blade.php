@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
        <div id="fondoRP" >
                <div class="titulo tituloRP">
                    <img id="logoMAPLV" src="img/maplv.png">
                    <label >Registro de padrinos</label>
                    <label  id="subText">Si eres de quienes ama darle al mundo un respiro, sé parte de nuestra familia y adopta un árbol.</label>
                </div>
            </div>
         </div>
        
        <div class="home">
        
         <div id="caja"> 

          <form id="cajaArbolRP" class="hvr-float">
            <div id="treeheaderRP">
              <div id="treeheadermascaraRP" class="container-fluid">
               <label id="RegArbol">Apadrina un árbol </label>
               <label>¡Regístrate!</label>
               </div>
             </div>


            <div id="contTipo">
              <div class="tipo1">
                 <label class="texto" for="persona">Persona</label>
              <input type="radio" name="persona">
              </div>
             
              <div class="tipo2">
                <label class="texto" for="empresa">Empresa</label>
                <input type="radio" name="empresa">
              </div>
              
            </div>
          
            <label class="texto" for="nombreCompleto">Nombre Completo:</label>
            <input type="text" name="nombreCompleto">

            <label class="texto" for="cedula">Cédula de identidad:</label>
            <input type="text" name="cedula">
            <div id="botonRP">
              <button class="btn_registrarRP">Registrar</button>
            </div>
          </form> 

            <div id="tabla" class="hvr-forward container-fluid">
            <form id="buscador" accion="{{route('registrarPadrino')}}" method="post">
                <input type="text" name="buscar" placeholder="Buscar una padrino">
                <button  class="btn_buscarRP"><i class="fas fa-search"></i></button>
            </form>
              <table id="tablaArbolesRP">
                <thead>
                <tr id="tablehead" >
                  <th>Nombre completo</th>
                  <th>Cédula</th>
                  <th>Acción</th>
                  
                </tr>
                 </thead> 
              <tbody>
               
                <tr class="fila">
                  <td class="fila">Lizeth Monge Padilla</td>
                  <td class="fila">117560371</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                       <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                    </td>
                </tr>
                <tr class="fila">
                  <td class="fila">Lizeth Monge Padilla</td>
                  <td class="fila">117560371</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                       <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                    </td>
                </tr>
                <tr class="fila">
                  <td class="fila">Lizeth Monge Padilla</td>
                  <td class="fila">117560371</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                       <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                    </td>
                </tr>
                <tr class="fila">
                  <td class="fila">Lizeth Monge Padilla</td>
                  <td class="fila">117560371</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                       <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                    </td>
                </tr>
                <tr class="fila">
                  <td class="fila">Lizeth Monge Padilla</td>
                  <td class="fila">117560371</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                       <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                    </td>
                </tr>
                <tr class="fila">
                  <td class="fila">Lizeth Monge Padilla</td>
                  <td class="fila">117560371</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                       <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                    </td>
                </tr>
               
              </tbody>
            </table>
            <div id="botonesEdicionArbolesRP">
                <button class="btn_arbolesRP"><i class="far fa-save"></i></button>
                <div id="paginacion">
                  <a class="btn_pagRP" href=" {{ route('registrarPadrino' )}}"> <i class="fas fa-backward"></i> </a>
                  <a class="btn_pagRP" href="{{ route('registrarPadrino')}}" > <i class="fas fa-forward"></i> </a>
                </div>
            </div>
          </div>
          </div>
        </div>
       
          
          
      
        </div>
    </div>
@endsection
