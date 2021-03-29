<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Helper\Util;
use App\Models\PadrinosModel;

class PadrinosController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /* Llama la vista de mantenimiento de categorías */
    public function mantenimientoPadrinos(){
    	return view('app/PadrinosView');
    }

    public function registrarPadrinos(){
    	return view('app/RegistrarPadrinosView');
    }

    public function reporteGlobal(){
    	return view('app/ReportePadrinoGlobalView');
    }
    public function reporteEspecifico(){
    	return view('app/ReportePadrinoEspecificoView');
    }
     
	public function registrarPadrino(Request $data){
        $validation = [
			'fp_cedula' => [ 'required', 'string', 'max:30', 'unique:fudebiol_padrinos' ],
			'fp_nombre_completo' => [ 'required', 'string', 'max:120' ],
			'fp_tipo' => [ 'required', 'in:P,E,O', ],
			'fp_correo' => [ 'required', 'string', 'max:300' ]
		];
        $validator = Validator::make( $data->all(), $validation );
        if ( $validator->fails() ){
			return redirect()->back()->with( "errores", $validator->errors()->all() )->withInput( $data->input() );
		} else {
            $model = new PadrinosModel();
			$result = $model->crearPadrino( $data );
			if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
				return redirect()->back()->with( "errores", array(
					$result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
				) );
			}else{
				return redirect('/arboles')->with( "mensajes", array(
					"¡Te has registrado exitosamente! Ahora elige el árbol que te guste."
				) );
			}
        }
    }
}
