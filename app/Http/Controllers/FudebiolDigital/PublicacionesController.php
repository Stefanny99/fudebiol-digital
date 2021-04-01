<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Session;

use App\Helper\Util;

use App\Models\PublicacionesModel;

class PublicacionesController extends Controller{
    public function publicaciones(){
        return view('app/PublicacionesView');
    }
    public function editorPublicaciones( Request $data ){
        $validator = Validator::make( $data->all(), [
            "fp_id" => [ "nullable", "integer" ]
        ] );
        if ( $validator->fails() ){
            return redirect()->back()->with( "errores", $validator->errors()->all() )->withInput( $data->input() );
        }
        if ( $data->has( "fp_id" ) && $data->input( "fp_id" ) > 0 ){
            $model = new PublicacionesModel();
            $result = $model->obtenerPublicacion( $data->input( "fp_id" ) );
            if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                return redirect()->back()->with( "errores", array(
                    $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
                ) );
            }
            return view( "app/EditorPublicacionesView", array(
                "publicacion" => $result[ "resultado" ],
                "publicacion_id" => $data->input( "fp_id" )
            ) );
        }
        return view('app/EditorPublicacionesView', array(
            "publicacion" => null,
            "publicacion_id" => null
        ) );
    }

    public function guardarPublicacion( Request $data ){
        $validator = Validator::make( $data->all(), [
            "fp_id" => [ "nullable", "integer" ],
            "fp_titulo" => [ "required", "string", "max:200" ],
            "fp_descripcion" => [ "required", "string", "max:1000" ],
            "fp-imagenes-temporales" => [ "nullable", "array" ],
            "fp-imagenes-temporales.*" => [ "integer" ],
            "fp-imagenes-eliminadas" => [ "nullable", "array" ],
            "fp-imagenes-eliminadas.*" => [ "nullable", "string" ],
            "fp-imagenes-temporales-eliminadas" => [ "nullable", "array" ],
            "fp-imagenes-temporales-eliminadas.*" => [ "nullable", "string" ],
        ] );
        if ( $validator->fails() ){
            return redirect()->back()->with( "errores", $validator->errors()->all() )->withInput( $data->input() );
        }
        if ( $data->has( "fp_id" ) && $data->input( "fp_id" ) > 0 ){
            $model = new PublicacionesModel();
            $result = $model->editarPublicacion( $data );
            if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                return redirect()->back()->with( "errores", array(
                    $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
                ) )->withInput( $data->input() );
            }
            return redirect()->route( "editorPublicaciones", [ "fp_id" => $data->input( "fp_id" ) ] )->with( "mensajes", array(
                "Publicación actualizada exitosamente"
            ) );
        }else{
            $model = new PublicacionesModel();
            $result = $model->agregarPublicacion( $data );
            if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                return redirect()->back()->with( "errores", array(
                    $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
                ) );
            }
            return redirect()->route( "editorPublicaciones", [ "fp_id" => $result[ "resultado" ] ] )->with( "mensajes", array(
                "Publicación agregada exitósamente"
            ) );
        }
    }

    public function agregarImagenesTemporales( Request $data ){
        $validator = Validator::make( $data->all(), [
            "imagenes" => [ "required", "array" ],
            "imagenes.*" => [ "image" ]
        ] );
        $response = array(
            "exito" => false,
            "errores" => array()
        );
        if ( $validator->fails() ){
            $response[ "errores" ] = $validator->errors()->all();
        }else{
            $model = new PublicacionesModel();
            $result = $model->agregarImagenesTemporales( $data );
            if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                $response[ "errores" ][] = $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ];
            }else{
                $response[ "exito" ] = true;
                $response[ "imagenes" ] = $result[ "resultado" ];
            }
        }
        return response()->json( $response );
    }

    public function administrarPublicaciones(){
        return view('app/AdministrarPublicacionesView');
    }
}
