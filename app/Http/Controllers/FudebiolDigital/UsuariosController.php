<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

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
        $this->middleware('auth');
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
    	if ( isset( $result[ "exito" ] ) ){
    		Session::flash( "mensaje" );
    		Session::flash( "exito", false );
    		return redirect()->back();
    	}else{
    		return view( "app\MantenimientoUsuarios", array(
    			"usuarios" => $result
    		) );
    	}
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
