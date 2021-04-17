<?php
    namespace App\Http\Controllers\FudebiolDigital;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Session;

    use App\Helper\Util;
    use App\Models\GaleriaModel;

    class GaleriaController extends Controller{
        public function galeria(){
            $model = new GaleriaModel();
            $result = $model->obtenerImagenes();
            if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                return redirect()->back()->with( "errores", array( $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ] ) );
            }
            return view( 'app\GaleriaView', array(
                "imagenes" => $result[ "resultado" ]
            ) );
        }

        public function editarGaleria(){
            $model = new GaleriaModel();
            $result = $model->obtenerImagenes();
            if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                return redirect()->back()->with( "errores", array( $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ] ) )->withInput( $request->input() );
            }
            return view('app\EditarGaleriaView', array(
                "imagenes" => $result[ "resultado" ]
            ) );
        }

        public function guardarFotos( Request $request ){
            $validator = Validator::make( $request->all(), [
                "fotos" => [ "required", "array" ],
                "fotos.*" => [ "image" ],
                "descripciones" => [ "nullable", "array" ],
                "descripciones.*" => [ "nullable", "string", "max:1000" ]
            ] );
            if ( $validator->fails() ){
                return redirect()->back()->with( "errores", $validator->errors()->all() )->withInput( $request->input() );
            }else{
                $model = new GaleriaModel();
                $result = $model->agregarImagenes( $request );
                return redirect()->back()->with( "mensajes", $result[ "errores" ] );
            }
        }

        public function editarFoto( Request $request ){
            if ( !$request->has( "eliminar" ) ){
                $validator = Validator::make( $request->all(), [
                    "fi_id" => [ "required", "integer" ],
                    "fi_descripcion" => [ "nullable", "string", "max:1000" ]
                ] );
                if ( $validator->fails() ){
                    return redirect()->back()->with( "errores", $validator->errors()->all() )->withInput( $request->input() );
                }else{
                    $model = new GaleriaModel();
                    $result = $model->editarImagen( $request );
                    if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                        return redirect()->back()->with( "errores", array( $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ] ) )->withInput( $request->input() );
                    }
                    return redirect()->back()->with( "mensajes", array(
                        "Imagen actualizada exitosamente"
                    ) );
                }
            }else{
                $validator = Validator::make( $request->all(), [
                    "fi_id" => [ "required", "integer" ],
                    "fi_formato" => [ "required", "string", "max:5" ]
                ] );
                if ( $validator->fails() ){
                    return redirect()->back()->with( "errores", $validator->errors()->all() )->withInput( $request->input() );
                }else{
                    $model = new GaleriaModel();
                    $result = $model->eliminarImagen( $request );
                    if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                        return redirect()->back()->with( "errores", array( $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ] ) )->withInput( $request->input() );
                    }
                    return redirect()->back()->with( "mensajes", array(
                        "Imagen eliminada exitosamente"
                    ) );
                }
            }
        }
    }
?>