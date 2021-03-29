<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

use App\Helper\Util;

use App\Models\NotificacionesModel;

class NotificacionesController extends Controller{

	public function mantenimientoNotificaciones( $pagina, Request $request ){
		$model = new NotificacionesModel();
		$result = $model->obtenerNotificaciones();
		if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
			return redirect()->back()->with( "errores", $result[ 'codigo' ][ 'descripcion' ] . ", " . $result[ 'razon' ] );
		}
		// $cantidadPaginas = $model->cantidadPaginas( $request->input( "buscar", "" ) );
		return view( 'app/NotificacionesView', array(
			"notificaciones" => $result[ 'resultado' ],
			// "pagina" => max( 1, $pagina ),
			// "cantidadPaginas" => $cantidadPaginas[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ? 1 : $cantidadPaginas[ "resultado" ],
		) );
	}

	public function crearNotificacion( Request $data ){
		$validation = [
			'fn_desecripcion' => [ 'string', 'max:300' ],
			'fn_tipo' => [ 'integer' ],
		];
		$validator = Validator::make( $data->all(), $validation );
		if ( $validator->fails() ){
			return redirect()->back()->with( "errores", $validator->errors()->all() )->withInput( $data->input() );
		}else {
			$model = new NotificacionesModel();
			$result = $model->crearNotificacion( $data );
			if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
				return redirect()->back()->with( "errores", array(
					$result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
				) );
			}else{
				return redirect()->back()->with( "notificaciones", array(
					"Notificado exitosamente"
				) );
			}
		}
	}

	public function eliminarNotificaciones( Request $data ){
		$model = new NotificacionesModel();
		$result = $model->eliminarNotificaciones( $data );
		if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
			return redirect()->back()->with( "errores", array(
				$result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
			) );
		}else{
			return redirect()->back()->with( "notificaciones", array(
				"Notificaciones eliminadas exitosamente"
			) );
		}
	}

	public function marcarNotificacionesComoLeidas( Request $data ){
		$model = new notificacionesModel();
		$result = $model->marcarNotificacionesComoLeidas( $data );
		if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
			return redirect()->back()->with( "errores", array(
				$result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
			) );
		}else{
			return redirect()->back()->with( "notificaciones", array(
				"Notificaciones marcadas como leídas exitosamente"
			) );
		}
	}

}