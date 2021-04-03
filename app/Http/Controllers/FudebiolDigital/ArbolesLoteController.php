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
}