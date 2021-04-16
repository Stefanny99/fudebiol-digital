<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

use App\Helper\Util;

use App\Models\ArbolesLoteModel;

class ArbolesLoteController extends Controller{
    public function arbolesPorLote(){
        $model = new ArbolesLoteModel();
        $result = $model->obtenerLotes();
        if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
            return redirect()->back()->with( "errores", array(
                $result[ "codigo" ][ "descripcion" ] . $result[ "razon" ]
            ) );
        }
        return view( 'app/ArbolesPorLoteView', array(
            "lotes" => $result[ "resultado" ]
        ) );
    }

    public function adoptarArbol( Request $request ){
        $validator = Validator::make( $request->all(), [
            "fal_id" => [ "required", "integer", "unique:fudebiol_padrinos_arboles,fpa_arbol_lote_id" ]
        ], [
            "fal_id.unique" => "El árbol no se encuentra disponible"
        ] );
        if ( $validator->fails() ){
            return redirect()->back()->with( "errores", $validator->errors()->all() );
        }
        $model = new ArbolesLoteModel();
        $result = $model->obtenerArbol( $request );
        if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
            return redirect()->back()->with( "errores", array(
                $result[ "codigo" ][ "descripcion" ] . $result[ "razon" ]
            ) );
        }
        return view( 'app/AdoptarArbolView', array(
            "arbol" => $result[ "resultado" ]
        ) );
    }

    public function actualizarToken( $token ){
        $response = array(
            "exito" => false,
            "errores" => array()
        );
        if ( $token && $token > 0 ){
            $model = new ArbolesLoteModel();
            $result = $model->actualizarToken( $token );
            if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                $response[ "errores" ][] = $result[ "codigo" ][ "descripcion" ] . $result[ "razon" ];
            }else{
                $response[ "exito" ] = true;
            }
        }else{
            $response[ "errores" ][] = "Token inválido";
        }
        return response()->json( $response );
    }

    public function finalizarAdopcion( Request $request ){
        $validator = Validator::make( $request->all(), [
            "fao_id" => [ "required", "integer" ],
            "fal_id" => [ "required", "integer" ],
            "fp_id" => [ "required", "integer" ],
            "comprobante" => [ "required", "file" ]
        ] );
        if ( $validator->fails() ){
            return redirect()->back()->with( array(
                "errores" => $validator->errors()->all(),
                "token_id" => $request->input( "fao_id", 0 )
            ) );
        }
        $model = new ArbolesLoteModel();
        $result = $model->finalizarAdopcion( $request );
        if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
            return redirect()->back()->with( array(
                "errores" => array(
                    $result[ "codigo" ][ "descripcion" ] . $result[ "razon" ]
                ),
                "token_id" => $request->input( "fao_id", 0 )
            ) );
        }
        return view( 'app/ComprobanteAdopcionView', 
            array( "nombre" => $request->input( "fp_nombre_completo" ) )
        )->with( "mensajes", array(
            "Adopción efectuada con éxito"
        ) );
    }

    public function mantenimientoArbolesLote($pagina, Request $request){
        $model = new ArbolesLoteModel();
        $result = $model->obtenerArbolesPorLote($request, $pagina);
        if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
            return redirect()->back()->with( "errores", array(
                $result[ "codigo" ][ "descripcion" ] . $result[ "razon" ]
            ) );
        }
        return view( 'app/RegistroArbolesIndividualesView', array(
            "arboles" => $result[ "resultado" ],
            "lotes" => $result[ "lotes" ],
            "especies" => $result[ "especies" ],
            "pagina" => $pagina,
            "lote_id" => $request->input( "lote_id"),
            "fila" => $request->input( "fila"),
            "columna" => $request->input( "columna"),
            "cantidadPaginas" => 1
        ) );
    }
}