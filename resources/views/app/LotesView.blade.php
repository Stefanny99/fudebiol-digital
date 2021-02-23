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

          <form id="cajaArbolRL" class="hvr-float" action="{{ route( 'editarLote' ) }}" method="post">
            @csrf
            <input type="hidden" id="id_lote" name="fl_id" value="0">
            <div id="treeheaderRL">
              <div id="treeheadermascaraRL" class="container-fluid">
               <label id="RegArbol">Registra un nuevo </label>
               <label>lote</label>
               </div>
             </div>
            
            <label class="texto" for="codigo_lote">Código:</label>
            <input type="text" id="codigo_lote" name="fl_nombre">

            <label class="texto" for="tamano_lote">Tamaño:</label>
            <input type="text" id="tamano_lote" name="fl_tamano">

            <label class="texto" for="filas_lote">Cantidad de filas:</label>
            <input type="text" id="filas_lote" name="fl_filas">

            <label class="texto" for="columnas_lote">Cantidad de columnas:</label>
            <input type="text" id="columnas_lote" name="fl_columnas">

            <div id="botonRL">
              <button type="submit" class="btn_registrarRL">Guardar</button>
              <button type="button" class="btn_limpiar" onclick="limpiarLote();">Limpiar</button>
            </div>
          </form> 

            <div id="tabla" class="hvr-forward container-fluid">
            <form id="buscador" accion="{{route('registrarPadrino')}}" method="post">
                <input type="text" name="buscar" placeholder="Buscar un lote">
                <button  class="btn_buscarRL"><i class="fas fa-search"></i></button>
            </form>
            <form action="{{ route( 'eliminarLotes' ) }}" method="post">  
              @csrf
              <table id="tablaArbolesRL">
              <caption>Lotes registrados</caption>
                <thead>
                  <th></th>
                  <th>Código</th>
                  <th>Tamaño</th>
                  <th>Filas</th>
                  <th>Columnas</th>
                  <th>Acción</th>
                </thead> 
              <tbody>
                @foreach ( $lotes as $lote )
                <tr class="fila" id="lote_{{ $lote->FL_ID }}" data-id="{{ $lote->FL_ID }}" data-codigo="{{ $lote->FL_NOMBRE }}" data-tamano="{{ $lote->FL_TAMANO }}" data-filas="{{ $lote->FL_FILAS }}" data-columnas="{{ $lote->FL_COLUMNAS }}">
                  <td><input name="ids[]" type="checkbox" value="{{ $lote->FL_ID }}"></td>
                  <td class="fila">{{ $lote->FL_NOMBRE }}</td>
                  <td class="fila">{{ $lote->FL_TAMANO }}</td>
                  <td class="fila">{{ $lote->FL_FILAS }}</td>
                  <td class="fila">{{ $lote->FL_COLUMNAS }}</td>
                  <td class="fila">
                       <label class="edit" onclick="editarLote( 'lote_{{ $lote->FL_ID }}' )"><i class="far fa-edit"></i></label>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div id="botonesEdicionArbolesRL">
                <button type="submit" class="btn_arbolesRL"><i class="far fa-trash-alt"></i></button>
                <div id="paginacion">
                  <a class="btn_pagRL" href=" {{ route('registrarPadrino' )}}"> <i class="fas fa-backward"></i> </a>
                  <a class="btn_pagRL" href="{{ route('registrarPadrino')}}" > <i class="fas fa-forward"></i> </a>
                </div>
            </div>
          </form>
          </div>
          </div>
        </div>      
        </div>
    </div>
@endsection
