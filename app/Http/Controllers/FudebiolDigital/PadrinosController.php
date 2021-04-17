<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Helper\Util;
use App\Models\PadrinosModel;

class PadrinosController extends Controller{
    public function mantenimientoPadrinos($pagina, Request $request){
        $model = new PadrinosModel();
        $result = $model->obtenerPadrinos( max( 1, $pagina ), $request->input( "buscar", "" ) );
        if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
            return redirect()->back()->with( "errores", $result[ 'codigo' ][ 'descripcion' ] . ", " . $result[ 'razon' ] );
        }
        $cantidadPaginas = $model->cantidadPaginas( $request->input( "buscar", "" ) );
        return view( 'app/PadrinosView', array(
            "padrinos" => $result[ 'resultado' ],
            "pagina" => max( 1, $pagina ),
            "cantidadPaginas" => $cantidadPaginas[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ? 1 : $cantidadPaginas[ "resultado" ],
            "buscar" => $request->input( "buscar", "" )
        ) );
    }

    public function editarPadrino(Request $data){
        $validator = Validator::make( $data->all(), [
            "fp_id" => [ "nullable", "integer" ]
        ] );
        if ( $validator->fails() ){
            return redirect()->back()->with( "errores", $validator->errors()->all() )->withInput( $data->input() );
        }
        if ( $data->has( "fp_id" ) && $data->input( "fp_id" ) > 0 ){
            $model = new PadrinosModel();
            $result = $model->obtenerPadrino( $data->input( "fp_id" ) );
            if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                return redirect()->back()->with( "errores", array(
                    $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
                ) );
            }
            return view( "app/RegistrarPadrinosView", array(
                "padrino" => $result[ "resultado" ]
            ) );
        }
        return view('app/RegistrarPadrinosView', array(
            "padrino" => null
        ) );
    }
     
    public function registrarPadrino(Request $data){
        $validation = [
            'fp_cedula' => [ 'required', 'string', 'max:30' ],
            'fp_nombre_completo' => [ 'required', 'string', 'max:120' ],
            'fp_tipo' => [ 'required', 'in:P,E,O', ],
            'fp_correo' => [ 'required', 'string', 'max:300' ]
        ];
        $nuevo = !$data->has( "fp_id" ) || $data->input( "fp_id" ) <= 0;
        if ( $nuevo ){
            $validation[ "fp_cedula" ][] = "unique:fudebiol_padrinos";
        }
        $validator = Validator::make( $data->all(), $validation );
        $validator = Validator::make( $data->all(), $validation );
        if ( $validator->fails() ){
            return redirect()->back()->with( "errores", $validator->errors()->all() )->withInput( $data->input() );
        } else if( $nuevo ){
            $model = new PadrinosModel();
            $result = $model->crearPadrino( $data );
            if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                return redirect()->back()->with( "errores", array(
                    $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
                ) )->withInput( $data->input() );
            }else{
                return redirect('/arboles')->with( "mensajes", array(
                    "¡Te has registrado exitosamente! Ahora elige el árbol que te guste."
                ) );
            }
        } else {
            $model = new PadrinosModel();
            $result = $model->editarPadrino( $data );
            if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                return redirect()->back()->with( "errores", array( $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ] ) )->withInput( $request->input() );
            }
            return redirect()->back()->with( "mensajes", array( "Registro actualizadoo exitosamente" ) );
        }
    }

    public function eliminarPadrinos( Request $data ){
        $model = new PadrinosModel();
        $result = $model->eliminarPadrinos( $data );
        if ( $result[ "errores" ].length > 0 ) {
            return redirect()->back()->with( "errores", $result[ "errores" ] );
        }else{
            return redirect()->back()->with( "mensajes", array(
                "Padrino eliminado exitosamente"
            ) );
        }
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

    public function buscarPadrino( Request $request ){
        $validator = Validator::make( $request->all(), [
            "fp_cedula" => [ "required", "string" ]
        ] );
        $response = array(
            "exito" => false,
            "errores" => array()
        );
        if ( $validator->fails() ){
            $response[ "errores" ] = $validator->errors()->all();
        }else{
            $model = new PadrinosModel();
            $result = $model->buscarPadrino( $request );
            if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                $response[ "errores" ][] = $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ];
            }else{
                $response[ "exito" ] = true;
                $response[ "padrino" ] = $result[ "resultado" ];
            }
        }
        return response()->json( $response );
    }

    public function generarCertificado( $fpa_id ){
        $model = new PadrinosModel();
        $result = $model->obtenerAdopcion( $fpa_id );

        if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
            Session::flash( "error", $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ] );
            return view( "app/CertificadoView", array(
                "adopcion" => null
            ) );
        }
        
        return view( "app/CertificadoView", array(
            "adopcion" => $result[ "resultado" ]
        ) );
    }
}
