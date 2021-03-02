@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
          <div id="fondo" >
                <div class="titulo tituloRA">
                    <img id="logoMAPLV" src="{{asset('img/maplv.png')}}">
                    <label >Registro de especies</label>
                    <label  id="subText"> Nuestro propósito es devolver al mundo tanta vida como la que nos ha dado.</label>
          
                </div>
            </div>
          <div class="home" >
            <div id="caja">
              <form id="cajaArbol" class="hvr-float" method="post" action="{{ route( 'editarArbol' ) }}">
                @csrf
                <div id="treeheader">
                  <div id="treeheadermascara"  class="container-fluid">
                    <label id="RegArbol">Registra una nueva </label>
                    <label>especie de árbol</label>
                  </div>
                </div>
                <label id="lblpictree" for="pictureTree">Agrega una foto<i class="far fa-folder-open"></i></i></label>
                <input type="file" id="pictureTree" name="fa_imagen"> 

                <label class="texto" for="nombreCientifico">Nombre científico:</label>
                <input type="text" required name="fa_nombre_cientifico">

                <label class="texto" for="nombreComun">Nombre comun:</label>
                <input type="text" required name="fa_nombre_comun">

                <label class="texto" for="jiffys">Jiffys:</label>
                <input type="text" required name="fa_jiffys">

                <label class="texto" for="bolsas">Bolsas:</label>
                <input type="text"  required name="fa_bolsas">

                <label class="texto" for="elevacion_maxima">Elevación máxima:</label>
                <input type="text"  required name="fa_elevacion_maxima">

                <label class="texto" for="elevacion_minima">Elevación mínima:</label>
                <input type="text" required name="fa_elevacion_minima">

                <button class="btn_registrar">Registrar</button>

              </form>  

              <div id="tabla" class="hvr-forward container-fluid">
                <form id="buscador" action="{{route('registrarArbol', 1)}}" method="get">
                    <input type="text" name="buscar" placeholder="Buscar una especie" value="{{ $buscar }}">
                    <button type="submit" class="btn_buscar"><i class="fas fa-search"></i></button>
                </form>
                <table id="tablaArboles">
                <caption>Especies registradas</caption>
                  <thead>
                    <tr id="tablehead" >
                      <th>Nombre científico</th>
                      <th>Nombre común</th>
                      <th>Jiffys</th>
                      <th>Bolsas</th>
                      <th>Elevación mínima</th>
                      <th>Elevación máxima </th>
                      <th>Acción</th>
                    </tr>
                  </thead> 
                  <tbody>
                    @foreach ( $arboles as $arbol )
                    <tr class="fila">
                      <td class="fila">{{ $arbol->FA_NOMBRE_CIENTIFICO }}</td>
                      <td class="fila overflow-hidden">{{ $arbol->FA_NOMBRES_COMUNES }}</td>
                      <td class="fila">{{ $arbol->FA_JIFFYS }}</td>
                      <td class="fila">{{ $arbol->FA_BOLSAS }}</td>
                      <td class="fila">{{ $arbol->FA_ELEVACION_MINIMA }}m</td>
                      <td class="fila">{{ $arbol->FA_ELEVACION_MAXIMA }}m</td>
                      <td class="fila">
                        <div class="action">
                          <label class="edit"><i class="far fa-edit"></i></label>
                        <label class="delete"><i class="far fa-trash-alt"></i></label>
                        </div>
                        
                      </td>
                    </tr>
                    @endforeach
                  
                  </tbody>
                </table>
                <div id="botonesEdicionArboles">
                    <button class="btn_arboles"><i class="far fa-save"></i></button>
                    <form id="paginacion" >
                      <a class="btn_pag" href="{{ route('registrarArbol', max( 1, $pagina - 1 ) ) }}?buscar={{ $buscar }}"> <i class="fas fa-backward"></i> </a>
                      <a class="btn_pag" href="{{ route('registrarArbol', $pagina + ( count( $arboles ) == 8 ) ) }}?buscar={{ $buscar }}" > <i class="fas fa-forward"></i> </a>
                    </form>
                </div>
            </div>
          </div>
        </div>
       
       
      </div>
    </div>
  </div>
@endsection
