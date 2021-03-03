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

                <label class="texto" for="especie">Rol</label>
                <select id="especie" name="role">
                    <option value="1">Guayabo</option>
                    <option value="2">Amarillon</option>
                </select>
               
                <label class="texto" for="lote">Rol</label>
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
                <form id="buscador" action="{{route('registrarArbol', 1)}}" method="get">
                    <input type="text" name="buscar" placeholder="Buscar un árbol">
                    <button type="submit" class="btn_buscarRAI"><i class="fas fa-search"></i></button>
                </form>
                <table id="tablaArbolesRAI">
                <caption>Árboles registrados</caption>
                  <thead>
                    <tr id="tablehead" >
                      <th>Especie</th>
                      <th>Lote</th>
                      <th>Coordenada N</th>
                      <th>Coordenada W </th>
                      <th>Fila</th>
                      <th>Columna</th>
                      <th>Acción</th>
                    </tr>
                  </thead> 
                  <tbody>
                  
                    <tr class="fila">
                      <td class="fila"></td>
                      <td class="fila overflow-hidden"></td>
                      <td class="fila"></td>
                      <td class="fila"></td>
                      <td class="fila"></td>
                      <td class="fila"></td>
                      <td class="fila">
                        <div class="action">
                          <label class="edit"><i class="far fa-edit"></i></label>
                        <label class="delete"><i class="far fa-trash-alt"></i></label>
                        </div>
                        
                      </td>
                    </tr>
                    
                  
                  </tbody>
                </table>
                <div id="botonesEdicionArbolesRAI">
                    <button class="btn_arbolesRAI"><i class="far fa-save"></i></button>
                    <form id="paginacion" >
                      <a class="btn_pagRAI"> <i class="fas fa-backward"></i> </a>
                      <a class="btn_pagRAI"> <i class="fas fa-forward"></i> </a>
                    </form>
                </div>
            </div>
          </div>
        </div>
       
       
      </div>
    </div>
  </div>
@endsection
