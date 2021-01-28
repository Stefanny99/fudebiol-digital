<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

use App\Helper\Util;

use App\Models\UsuariosModel;

class UsuariosController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /* Llama la vista de mantenimiento de categorías */
    public function mantenimientoUsuarios(){
    	$model = new UsuariosModel();
    	$result = $model->obtenerUsuarios();

    	if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
    		Session::flash( "error", array( $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ] ) );
    		return redirect()->back();
    	}
    	return view( "app\MantenimientoUsuariosView", array(
			"usuarios" => $result[ "resultado" ]
		) );
    }
     
	public function insertarUsuario( Request $data ){
		$validator = Validator::make( $data->all(), [
            'name' => [ 'required', 'string', 'max:255' ],
            'username' => [ 'required', 'string', 'max:15','unique:users' ],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:users' ],
            'role' => [ 'required', 'string', 'max:1' ],
            'password' => [ 'required', 'string', 'min:8', 'confirmed' ],
        ]);
        if ( $validator->fails() ){
        	return redirect()->back()->withErrors( $validator )->withInput( $data->input() );
        }else{
        	$model = new UsuariosModel();
        	$result = $model->crearUsuario( $data );
        	Session::flash( "mensaje", $result[ "resultado" ] );
        	Session::flash( "exito", $result[ "exito" ] );
        }
        return redirect()->back();
	}
}
