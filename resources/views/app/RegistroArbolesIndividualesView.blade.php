@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
          <div id="fondoRAI" >
                <div class="titulo tituloRAI">
                    <img id="logoMAPLV" src="{{asset('img/maplv.png')}}">
                    <label >Registro de árboles</label>
                    <label  id="subText">Por un futuro verde, por un futuro mejor</label>
          
                </div>
            </div>
          <div class="home" >
            <div id="caja">
              <form id="cajaArbolRAI" class="hvr-float" method="post" action="{{ route( 'editarArbol' ) }}">
                
                <div id="treeheaderRAI">
                  <div id="treeheadermascaraRAI"  class="container-fluid">
                    <label id="RegArbol">Registra un nuevo </label>
                    <label>árbol</label>
                  </div>
                </div>

                <label class="texto" for="especie">Especie</label>
                <select id="especie" name="role">
                    <option value="1">Guayabo</option>
                    <option value="2">Amarillon</option>
                </select>
               
                <label class="texto" for="lote">Lote</label>
                <select id="lote" name="role">
                    <option value="1">L1</option>
                    <option value="2">L2</option>
                </select>
               

                <label class="texto" for="jiffys">Coordenada N:</label>
                <input type="text" required name="fa_jiffys">

                <label class="texto" for="bolsas">Coordenada W:</label>
                <input type="text"  required name="fa_bolsas">

                <label class="texto" for="elevacion_maxima">Fila:</label>
                <input type="text"  required name="fa_elevacion_maxima">

                <label class="texto" for="elevacion_minima">Columna:</label>
                <input type="text" required name="fa_elevacion_minima">

                <button class="btn_registrarRAI">Registrar</button>

              </form>  

              <div id="tabla" class="hvr-forward container-fluid">
                <form class="row_container centrar" id="buscadorA" action="{{route('registrarArbol', 1)}}" method="get">
                  <div class="row_container w-25 centrar" >  
                    <label class="texto" for="lote"><b>Lote:</b></label>
                    <select name="lote" class="ml">
                        <option value="1">L1</option>
                        <option value="2">L2</option>
                        <option value="2">L3</option>
                        <option value="2">L4</option>
                    </select>
                  </div>
                  <div class="row_container w-25 centrar">
                    <label class="texto" for="lote"><b>Fila:</b></label>
                    <input type="text" name="buscar" class="ml">
                  </div>
                  <div class="row_container w-25 ml centrar">
                  <label class="texto" for="lote"><b>Columna:</b></label>
                  <input type="text" name="buscar" class="ml">
                  </div>
                  <button type="submit" class="btn_buscarRAI ml"><i class="fas fa-search"></i></button>
                  
                </form>
                <form class="tableForm" action="{{ route( 'eliminarArboles' ) }}" method="post"> 
                <div class= "beforeTable" >
                <table id="tablaArbolesRAI">
                <caption>Árboles registrados</caption>
                  <thead>
                    <tr id="tablehead" >
                      <th>Especie</th>
                      <th>Lote</th>
                      <th>Coord N</th>
                      <th>Coord W </th>
                      <th>Fila</th>
                      <th>Columna</th>
                      <th>Acción</th>
                    </tr>
                  </thead> 
                  <tbody>
                  
                    <tr class="fila">
                      <td class="fila">ashdjhfajhsdfjkhdsjkf</td>
                      <td class="fila overflow-hidden">kasjhahdsjhdjashd</td>
                      <td class="fila">345</td>
                      <td class="fila">87458375983</td>
                      <td class="fila">874592749237492</td>
                      <td class="fila">3287492349</td>
                      <td class="fila">
                        <div class="action">
                          <label class="edit"><i class="far fa-edit"></i></label>
                        </div>
                        
                      </td>
                    </tr>
                    
                  
                  </tbody>
                </table>
                </div>
                <div id="botonesEdicionArbolesRAI">
                    <button class="btn_arbolesRAI"><i class="far fa-trash-alt"></i></button>
                    <form id="paginacion" >
                      <a class="btn_pagRAI"> <i class="fas fa-backward"></i> </a>
                      <a class="btn_pagRAI"> <i class="fas fa-forward"></i> </a>
                    </form>
                </div>
              </form> 
            </div>
          </div>
        </div>
       
       
      </div>
    </div>
  </div>
@endsection
