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
        }
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
    }

    public function eliminarPadrino( Request $data ){
        $model = new PadrinosModel();
        $result = $model->eliminarPadrino( $data );
        if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
            return redirect()->back()->with( "errores", array(
                $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
            ) );
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
}
