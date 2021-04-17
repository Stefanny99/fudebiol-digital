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
							<form id="cajaArbolRAI" class="hvr-float" method="post" action="{{ route( 'editarArbolLote' ) }}">
								@csrf
								<input type="hidden" id="id_arbol_lote" name="fal_id" value="0">
								<div id="treeheaderRAI">
									<div id="treeheadermascaraRAI"  class="container-fluid">
										<label id="RegArbol">Registra un nuevo </label>
										<label>árbol</label>
									</div>
								</div>

								<label class="texto" for="especie">Especie</label>
								<select id="especie" name="fal_arbol_id">
									@foreach($especies as $especie)
											<option value="{{ $especie->FA_ID }}">{{ $especie->FA_NOMBRES_COMUNES }}</option>
									@endforeach
								</select>
							 
								<label class="texto" for="lote">Lote</label>
								<select id="lote" name="fal_lote_id">
									@foreach($lotes as $lote)
										<option value="{{ $lote->FL_ID }}">{{ $lote->FL_NOMBRE }}</option>
									@endforeach
								</select>
							 
								<label class="texto" for="coordenadaN">Coordenada N:</label>
								<input type="text" id="coordenadaN" required name="fal_coordenada_N">

								<label class="texto" for="coordenadaW">Coordenada W:</label>
								<input type="text"  id="coordenadaW" required name="fal_coordenada_W">

								<label class="texto" for="fila">Fila:</label>
								<input type="text"  id="fila" required name="fal_fila">

								<label class="texto" for="columna">Columna:</label>
								<input type="text" id="columna" required name="fal_columna">

								<div id="botonRL">
									<button class="btn_guardar">Guardar</button>
									<button class="btn_limpiar btn_limpiar3" onclick="limpiarArbolLote()">Limpiar</button>
								</div>
							</form>  

							<div id="tabla" class="hvr-forward container-fluid">
								<form class="row_container centrar" id="buscadorA" action="{{route('registroArbol', 1)}}" method="get">
									<div class="row_container w-25 centrar" >  
										<label class="texto" for="lote"><b>Lote:</b></label>
										<select name="lote_id" class="ml">
												@foreach($lotes as $lote)
												<option value="{{ $lote->FL_ID }}" name="lote_id">{{ $lote->FL_NOMBRE }}</option>
												@endforeach
										</select>
									</div>
									<div class="row_container w-25 centrar">
										<label class="texto" for="lote"><b>Fila:</b></label>
										<input type="text" name="fila" value="{{ $fila }}" class="ml">
									</div>
									<div class="row_container w-25 ml centrar">
									<label class="texto" for="lote"><b>Columna:</b></label>
									<input type="text" name="columna" value="{{ $columna }}" class="ml">
									</div>
									<button type="submit" class="btn_buscarRAI ml"><i class="fas fa-search"></i></button>
								</form>
								<form class="tableForm" action="{{ route( 'eliminarArbolesLote' ) }}" method="post"> 
								@csrf
								<div class= "beforeTable" >
								<table id="tablaArbolesRAI">
								<caption>Árboles registrados</caption>
									<thead>
										<tr id="tablehead" >
                                            <th></th>
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
									@foreach ( $arboles as $arbol)
										<tr class="fila"
											id="arbol_lote_{{ $arbol->FAL_ID }}" 
											data-id="{{ $arbol->FAL_ID }}" 
											data-arbol-id="{{ $arbol->FAL_ARBOL_ID }}" 
											data-lote-id="{{ $arbol->FAL_LOTE_ID }}" 
											data-coordenada-W="{{ $arbol->FAL_COORDENADA_W }}"
											data-coordenada-N="{{ $arbol->FAL_COORDENADA_N }}"
											data-fila="{{ $arbol->FAL_FILA }}"
											data-columna="{{ $arbol->FAL_COLUMNA }}"
										>
                                            <td class="fila"><input type="checkbox" name="fal-arboles-eliminados[]" value="{{ $arbol->FAL_ID }}"></td>
											<td class="fila">{{ $arbol->FA_NOMBRES_COMUNES }}</td>
											<td class="fila overflow-hidden">{{ $arbol->FL_NOMBRE }}</td>
											<td class="fila">{{ $arbol->FAL_COORDENADA_N }}</td>
											<td class="fila">{{ $arbol->FAL_COORDENADA_W }}</td>
											<td class="fila">{{ $arbol->FAL_FILA }}</td>
											<td class="fila">{{ $arbol->FAL_COLUMNA }}</td>
											<td class="fila">
												<label class="edit" onclick="editarArbolLote( 'arbol_lote_{{ $arbol->FAL_ID }}' )"><i class="far fa-edit"></i></label>
											</td>
										</tr>
									@endforeach  
									</tbody>
								</table>
								</div>
								<div id="botonesEdicionArbolesRAI">
										<button class="btn_arbolesRAI" type="submit"><i class="far fa-trash-alt"></i></button>
										<div id="paginacion" >
											<a class="btn_pagRAI"  href="{{ route('registroArbol', max( 1, $pagina - 1 ) ) }}?lote_id={{ $lote_id }}?fila={{ $fila }}?columna={{ $columna }}">
												<i class="fas fa-backward"></i>
											</a>
											<span style="letter-spacing: normal; text-align: center; word-spacing: normal; white-space: nowrap; margin-right: 10%;">{{ $pagina }} de {{ $cantidadPaginas }}</span>
											<a class="btn_pagRAI" href="{{ route('registroArbol', min( $pagina + 1, $cantidadPaginas ) ) }}?lote_id={{ $lote_id }}?fila={{ $fila }}?columna={{ $columna }}">
												<i class="fas fa-forward"></i>
											</a>
									</div>
								</div>
							</form> 
						</div>
					</div>
				</div>
			 
			 
			</div>
		</div>
	</div>
@endsection
