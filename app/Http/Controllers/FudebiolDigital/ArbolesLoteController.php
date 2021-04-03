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
}