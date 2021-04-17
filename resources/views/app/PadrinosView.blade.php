@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
        <div id="fondoRP" >
                <div class="titulo tituloRP">
                    <img id="logoMAPLV" src="{{asset('img/maplv.png')}}">
                    <label >Registro de padrinos</label>
                    <label  id="subText">Si eres de quienes ama darle al mundo un respiro, sé parte de nuestra familia y adopta un árbol.</label>
                </div>
            </div>
         </div>
        
        <div class="home">
        
         <div id="cajaRP"> 
             
              
          <div id="tablaRP">
            <form id="buscador" accion="{{ route('verPadrino', $pagina ) }}" method="get">
                <input type="text" name="buscar" placeholder="Buscar un padrino" value="{{ $buscar }}">
                <button  class="btn_buscarRP"><i class="fas fa-search"></i></button>
            </form>
            <form action="{{ route( 'eliminarPadrinos' ) }}" method="post">  
              @csrf
              <table id="tablaArbolesRP">
              <caption>Padrinos registrados con FUDEBIOL Digital</caption>
                <thead>
                <tr id="tablehead" >
                  <th></th>
                  <th>Nombre completo</th>
                  <th>Cédula</th>
                  <th>Tipo</th>
                  <th>Correo</th>
                  <th>Acción</th>
                </tr>
                 </thead> 
              <tbody>
                @foreach ( $padrinos as $padrino )
                <tr class="fila" id="padrino_{{ $padrino->FP_ID }}">
                  <td class="fila"><input name="padrinos_eliminar[{{ $padrino->FP_ID }}]" type="checkbox" value="{{ $padrino->FP_NOMBRE_COMPLETO }}"></td>
                  <td class="fila nombrePadrino">{{ $padrino->FP_NOMBRE_COMPLETO }}</td>
                  <td class="fila">{{ $padrino->FP_CEDULA }}</td>
                  <td class="fila">{{ $padrino->FP_TIPO === 'P' ? 'Persona' : ( $padrino->FP_TIPO === 'O' ? 'Otro' : 'Empresa' ) }}</td>
                  <td class="fila">{{ $padrino->FP_CORREO }}</td>
                  <td class="fila"></td>
                  <td class="fila">
                    <div class="action">
                       <a class="edit" href="{{ route('editarPadrino').'?fp_id='.$padrino->FP_ID }}"><i class="far fa-edit"></i></a>
                       <label class="report"><i class="fas fa-chart-bar"></i></label>
                    </div>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div id="botonesEdicionArbolesRP">
                <button type="submit" class="btn_arbolesRL"><i class="far fa-trash-alt"></i></button>
                <a href="{{ route('reporteArboles') }}" class="global_report_padrino global_report"> 
                  <i class="fas fa-chart-pie"></i>
                </a>
                <div id="paginacion">
                  <a class="btn_pagRP" href=" {{ route('registrarPadrino' )}}"> <i class="fas fa-backward"></i> </a>
                  <span style="letter-spacing: normal; text-align: center; word-spacing: normal; white-space: nowrap; margin-right: 10%;">{{ $pagina }} de {{ $cantidadPaginas }}</span>
                  <a class="btn_pagRP" href="{{ route('registrarPadrino')}}" > <i class="fas fa-forward"></i> </a>
                </div>
            </div>
          </div>
          </form>
          </div>
        </div>
        </div>
    </div>
@endsection
