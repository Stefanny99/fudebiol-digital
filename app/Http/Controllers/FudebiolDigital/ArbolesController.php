<?php
namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Helper\Util;
use App\Models\ArbolesModel;

class ArbolesController extends Controller{
	public function registrarArbol( $pagina, Request $request ){
		$model = new ArbolesModel();
		$result = $model->obtenerArboles( max( 1, $pagina ), $request->input( "buscar", "" ) );
		if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
			return redirect()->back()->with( "errores", array( $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ] ) );
		}
		$cantidadPaginas = $model->cantidadPaginas( $request->input( "buscar", "" ) );
		return view( 'app/RegistroArbolesView', array(
			"arboles" => $result[ "resultado" ],
			"pagina" => max( 1, $pagina ),
			"cantidadPaginas" => $cantidadPaginas[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ? 1 : $cantidadPaginas[ "resultado" ],
			"buscar" => $request->input( "buscar", "" )
		) );
	}

	public function editarArbol( Request $request ){
		$validator = Validator::make( $request->all(), [
			'fa_nombre_cientifico' => [ 'required', 'string', 'max:30' ],
			'fa_nombres_comunes' => [ 'string', 'max:150'],
			'fa_jiffys' => [ 'required', 'numeric' ],
			'fa_bolsas' => [ 'required', 'numeric' ],
			'fa_elevacion_minima' => [ 'required', 'numeric' ],
			'fa_elevacion_maxima' => [ 'required', 'numeric' ],
			'fa_imagen' => [ 'image' ],
			'imagen_eliminada' => [ 'numeric' ],
		]);
		if ( $validator->fails() ){
			return redirect()->back()->with( "errores", $validator->errors()->all() )->withInput( $request->input() );
		}else {
			$model = new ArbolesModel();
			if ( !$request->has( "fa_id" ) || $request->input( "fa_id" ) < 1 ){
				$result = $model->crearArbol( $request );
				if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
					return redirect()->back()->with( "errores", array( $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ] ) )->withInput( $request->input() );
				}
				return redirect()->back()->with( "mensajes", array( "Árbol insertado exitosamente" ) );
			}else{
				$result = $model->editarArbol( $request );
				if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
					return redirect()->back()->with( "errores", array( $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ] ) )->withInput( $request->input() );
				}
				return redirect()->back()->with( "mensajes", array( "Árbol editado exitosamente" ) );
			}
		}
	}
    
    public function introduccionMAPLV(){
        return view( 'app/MiArbolParaLaVidaView' );
    }

		public function registroArbol(){
			return view( 'app/RegistroArbolesIndividualesView' );
	}
}