<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

use App\Helper\Util;

use App\Models\NotificacionesModel;

class NotificacionesController extends Controller{

	public function mantenimientoNotificaciones( Request $request ){
		$model = new NotificacionesModel();
		$result = $model->obtenerNotificaciones();
		if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
			return redirect()->back()->with( "errores", $result[ 'codigo' ][ 'descripcion' ] . ", " . $result[ 'razon' ] );
		}
		return view( 'app/NotificacionesView', array(
			"notificaciones" => $result[ 'resultado' ]
		) );
	}

	public function rechazarAdopcion( Request $data ){
		$model = new NotificacionesModel();
		$result = $model->eliminarNotificacion( $data );
		if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
			return redirect()->back()->with( "errores", array(
				$result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
			) );
		}else{
			return redirect()->back()->with( "mensajes", array(
				"Se ha rechazado la adopción exitosamente"
			) );
		}
	}

	public function aceptarAdopcion( Request $data ){
		$model = new notificacionesModel();
		$result = $model->marcarNotificacionesComoLeidas( $data );
		if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
			return redirect()->back()->with( "errores", array(
				$result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
			) );
		}else{
			return redirect()->back()->with( "mensajes", array(
				"Adopción aceptada correctamente"
			) );
		}
	}

}