<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

use App\Helper\Util;

use App\Models\LotesModel;

class LotesController extends Controller{
	public function __construct(){

	}

	public function mantenimientoLotes(){
		$model = new LotesModel();
		$result = $model->obtenerLotes();
		if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
			return redirect()->back()->with( array(
				"errores" => $result[ 'codigo' ][ 'descripcion' ] . ", " . $result[ 'razon' ]
			) );
		}
		return view( 'app/LotesView', array(
			"lotes" => $result[ 'resultado' ]
		) );
	}

	public function editarLote( Request $data ){
		
	}

	public function eliminarLotes( Request $data ){
		
	}

	public function arbolesPorLote(){
		return view('app/ArbolesPorLoteView');
	}
}