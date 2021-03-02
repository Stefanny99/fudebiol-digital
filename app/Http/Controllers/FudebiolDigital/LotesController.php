<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

use App\Helper\Util;

use App\Models\LotesModel;

class LotesController extends Controller{
	public function mantenimientoLotes( Request $request ){
		$model = new LotesModel();
		$result = $model->obtenerLotes($request->input( "buscar", "" ));
		if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
			return redirect()->back()->with( array(
				"errores" => $result[ 'codigo' ][ 'descripcion' ] . ", " . $result[ 'razon' ]
			) );
		}
		return view( 'app/LotesView', array(
			"lotes" => $result[ 'resultado' ],
			"buscar" => $request->input( "buscar", "" )
		) );
	}

	public function editarLote( Request $data ){
		$validation = [
			'fl_nombre' => [ 'required', 'string', 'max:10' ],
			'fl_tamano' => [ 'required', 'numeric' ],
			'fl_filas' => [ 'required', 'integer' ],
			'fl_columnas' => [ 'required', 'integer' ]
		];
		$nuevo = !$data->has( "fl_id" ) || $data->input( "fl_id" ) <= 0;
		if ( $nuevo ){
			$validation[ "fl_nombre" ][] = "unique:fudebiol_lotes";
		}
		$validator = Validator::make( $data->all(), $validation );

		if ( $validator->fails() ){
			return redirect()->back()->with( "errores", $validator->errors()->all() )->withInput( $data->input() );
		}else if ( $nuevo ){
			$model = new LotesModel();
			$result = $model->crearLote( $data );
			if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
				return redirect()->back()->with( "errores", array(
					$result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
				) );
			}else{
				return redirect()->back()->with( "mensajes", array(
					"Lote insertado exitosamente"
				) );
			}
		}else{
			$model = new LotesModel();
			$result = $model->editarLote( $data );
			if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
				return redirect()->back()->with( "errores", array(
					$result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
				) );
			}else{
				return redirect()->back()->with( "mensajes", array(
					"Lote actualizado exitosamente"
				) );
			}
		}
	}

	public function eliminarLotes( Request $data ){
		$model = new LotesModel();
		$result = $model->eliminarLotes( $data );
		if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
			return redirect()->back()->with( "errores", array(
				$result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
			) );
		}else{
			return redirect()->back()->with( "mensajes", array(
				"Lotes eliminados exitosamente"
			) );
		}
	}

	public function arbolesPorLote(){
		return view('app/ArbolesPorLoteView');
	}
}