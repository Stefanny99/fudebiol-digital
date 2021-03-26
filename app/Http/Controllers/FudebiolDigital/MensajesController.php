<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

use App\Helper\Util;

use App\Models\MensajesModel;

class MensajesController extends Controller{

	public function mantenimientoMensajes( $pagina, Request $request ){
		$model = new MensajesModel();
		$result = $model->obtenerMensajes( max( 1, $pagina ) );
		if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
			return redirect()->back()->with( "errores", $result[ 'codigo' ][ 'descripcion' ] . ", " . $result[ 'razon' ] );
		}
		$cantidadPaginas = $model->cantidadPaginas( $request->input( "buscar", "" ) );
		return view( 'app/MensajesView', array(
			"mensajes" => $result[ 'resultado' ],
			"pagina" => max( 1, $pagina ),
			"cantidadPaginas" => $cantidadPaginas[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ? 1 : $cantidadPaginas[ "resultado" ],
		) );
	}

	public function enviarMensaje( Request $data ){
		$validation = [
			'fm_correo' => [ 'string', 'max:250' ],
			'fm_telefono' => [ 'numeric' ],
			'fm_texto' => [ 'required', 'string', 'max:1000' ],
		];
		$validator = Validator::make( $data->all(), $validation );
		if ( $validator->fails() ){
			return redirect()->back()->with( "errores", $validator->errors()->all() )->withInput( $data->input() );
		}else {
			$model = new MensajesModel();
			$result = $model->crearMensaje( $data );
			if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
				return redirect()->back()->with( "errores", array(
					$result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
				) );
			}else{
				return redirect()->back()->with( "mensajes", array(
					"Mensaje enviado exitosamente"
				) );
			}
		}
	}

	public function eliminarMensajes( Request $data ){
		$model = new MensajesModel();
		$result = $model->eliminarMensajes( $data );
		if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
			return redirect()->back()->with( "errores", array(
				$result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
			) );
		}else{
			return redirect()->back()->with( "mensajes", array(
				"Mensajes eliminados exitosamente"
			) );
		}
	}

	public function marcarMensajeComoLeidos( Request $data ){
		$model = new MensajesModel();
		$result = $model->marcarMensajeComoLeidos( $data );
		if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
			return redirect()->back()->with( "errores", array(
				$result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
			) );
		}else{
			return redirect()->back()->with( "mensajes", array(
				"Mensajes marcados como leídos exitosamente"
			) );
		}
	}

}