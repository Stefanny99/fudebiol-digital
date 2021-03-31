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
                <input type="text" name="buscar" placeholder="Buscar un padrino" value="{{ $buscar }}">>
                <button  class="btn_buscarRP"><i class="fas fa-search"></i></button>
            </form>
            <form action="{{ route( 'eliminarPadrino' ) }}" method="post">  
              @csrf
              <table id="tablaArbolesRP">
              <caption>Padrinos registrados con FUDEBIOL Digital</caption>
                <thead>
                <tr id="tablehead" >
                  <th>Nombre completo</th>
                  <th>Cédula</th>
                  <th>Acción</th>
                  
                </tr>
                 </thead> 
              <tbody>
                @foreach ( $padrinos as $padrino )
                <tr class="fila" id="padrino_{{ $padrino->FP_ID }}">
                  <td class="fila nombrePadrino">{{ $padrino->FP_NOMBRE_COMPLETO }}</td>
                  <td class="fila">117560371</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                       <button type="submit" class="" name="fp_id" value="{{ $padrino->FP_ID }}"><i class="far fa-trash-alt"></i></button>
                       <label class="report"><i class="fas fa-chart-bar"></i></label>
                    </div>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div id="botonesEdicionArbolesRP">
                <div id="paginacion">
                  <a class="btn_pagRP" href=" {{ route('registrarPadrino' )}}"> <i class="fas fa-backward"></i> </a>
                  <a class="btn_pagRP" href="{{ route('registrarPadrino')}}" > <i class="fas fa-forward"></i> </a>
                </div>
            </div>
          </div>
          </form>
          <div id="tablaRP">
            <form id="buscador" accion="{{route('registrarPadrino')}}" method="post">
                <input type="text" name="buscar" placeholder="Buscar un padrino">
                <button  class="btn_buscarRP"><i class="fas fa-search"></i></button>
            </form>
              <table id="tablaArbolesRP" class="sinFD">
              <caption>Padrinos registrados sin FUDEBIOL Digital</caption>
                <thead>
                <tr id="tablehead" >
                  <th>Nombre completo</th>
                  <th>Acción</th>
                  
                </tr>
                 </thead> 
              <tbody>
                <tr class="fila">
                  <td class="fila">Lizeth Monge Padilla</td>
                  
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                       <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                    </td>
                </tr>
                <tr class="fila">
                  <td class="fila">Lizeth Monge Padilla</td>
                  
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
