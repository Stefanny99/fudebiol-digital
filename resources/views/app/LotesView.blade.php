@extends('layouts.app')
@section('content')
    <div id="body_home">     
      <div id="contenido">
        <div id="fondoRL" >
          <div class="titulo tituloRL">
              <img id="logoMAPLV" src="{{asset('img/maplv.png')}}">
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
              <button type="submit" class="btn_guardar">Guardar</button>
              <button type="button" class="btn_limpiar" onclick="limpiarLote();">Limpiar</button>
            </div>
          </form> 

            <div id="tabla" class="hvr-forward container-fluid">
            <form id="buscador" accion="{{ route( 'lotes', $pagina ) }}" method="get">
                <input type="text" name="buscar" placeholder="Buscar un lote" value="{{ $buscar }}">
                <button  class="btn_buscarRL"><i class="fas fa-search"></i></button>
            </form>
            <form class="tableForm" action="{{ route( 'eliminarLotes' ) }}" method="post">  
              @csrf
            <div class= "beforeTable" >
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
                  <td><input name="lotes_eliminar[{{ $lote->FL_ID }}]" type="checkbox" value="{{ $lote->FL_NOMBRE }}"></td>
                  <td class="fila">{{ $lote->FL_NOMBRE }}</td>
                  <td class="fila">{{ $lote->FL_TAMANO }} <span style="display: inline-flex; flex-direction: row; align-items: flex-end;">m<span style="font-size: 10px; transform: translateY(-60%);">2</span></span></td>
                  <td class="fila">{{ $lote->FL_FILAS }}</td>
                  <td class="fila">{{ $lote->FL_COLUMNAS }}</td>
                  <td class="fila">
                       <label class="edit" onclick="editarLote( 'lote_{{ $lote->FL_ID }}' )"><i class="far fa-edit"></i></label>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
           </div> 
            <div id="botonesEdicionArbolesRL">
                <button type="submit" class="btn_arbolesRL"><i class="far fa-trash-alt"></i></button>
                <div id="paginacion">
                  <a class="btn_pagRL" href=" {{ route( 'lotes', max( 1, $pagina - 1 ) ) }}?buscar={{ $buscar }}"> <i class="fas fa-backward"></i> </a>
                  <span style="letter-spacing: normal; text-align: center; word-spacing: normal; white-space: nowrap; margin-right: 10%;">{{ $pagina }} de {{ $cantidadPaginas }}</span>
                  <a class="btn_pagRL" href="{{ route( 'lotes', min( $pagina + 1, $cantidadPaginas ) ) }}?buscar={{ $buscar }}" > <i class="fas fa-forward"></i> </a>
                </div>
            </div>
          </form>
          </div>
          </div>
        </div>  
        <div id="pie">
            <div class="bottom">
                <div class="left">
                    <img class="icon img-responsive" src="{{ asset( 'img/vector.png' ) }}"></img>
                    <div class="sitename">&copy;FUDEBIOL</div>
                </div>
                <div class="middle">
                    <a class="facebook contact" href="https://www.facebook.com/FUDEBIOL/">
                        <img class="icon img-responsive" src="img/facebook.png"></img>
                        <div class="label">@FUDEBIOL</div>
                    </a>
                    <a class="whatsapp contact" href="https://wa.me/+50672659372">
                        <img class="icon img-responsive" src="{{ asset( 'img/whatsapp.png' ) }}"></img>
                        <div class="label">2771-4131</div>
                    </a>
                    <a class="email contact" href="mailto:udebiol@gmail.com">
                        <img class="icon img-responsive" src="{{ asset( 'img/email.png' ) }}"></img>
                        <div class="label">fudebiol@gmail.com</div>
                    </a>
                </div>
               
            </div>
        </div>
    </div>    
        </div>
    </div>
@endsection
