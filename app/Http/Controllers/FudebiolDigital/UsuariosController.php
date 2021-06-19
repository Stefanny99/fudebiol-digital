<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

use App\Helper\Util;

use App\Models\UsuariosModel;

class UsuariosController extends Controller{
    public function mantenimientoUsuarios(){
        $model = new UsuariosModel();
        $result = $model->obtenerUsuarios();

        if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
            return redirect()->back()->with( "errores", array(
                $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
            ) );
        }
        return view( "app/MantenimientoUsuariosView", array(
            "usuarios" => $result[ "resultado" ]
        ) );
    }

    public function editarUsuario( Request $data ){
        if ( !$data->has( "id" ) || $data->input( "id" ) <= 0 ){
            $validator = Validator::make( $data->all(), [
                'name' => [ 'required', 'string', 'max:255' ],
                'username' => [ 'required', 'string', 'max:15','unique:users' ],
                'email' => [ 'required', 'string', 'email', 'max:255', 'unique:users' ],
                'role' => [ 'required', 'string', 'max:1' ],
                'password' => [ 'required', 'string', 'min:8', 'confirmed' ],
            ]);
            if ( $validator->fails() ){
                return redirect()->back()->with( "errores", $validator->errors()->all() )->withInput( $data->input() );
            }else{
                $model = new UsuariosModel();
                $result = $model->crearUsuario( $data );
                if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                    return redirect()->back()->with( "errores", array(
                        $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
                    ) );
                }else{
                    return redirect()->back()->with( "mensajes", array(
                        "Usuario insertado exitosamente"
                    ) );
                }
            }
        }else{
            $validator = Validator::make( $data->all(), [
                'name' => [ 'required', 'string', 'max:255' ],
                'username' => [ 'required', 'string', 'max:15' ],
                'email' => [ 'required', 'string', 'email', 'max:255' ],
                'role' => [ 'required', 'string', 'max:1' ],
                'password' => [ 'nullable', 'string', 'min:8', 'confirmed' ],
            ]);
            if ( $validator->fails() ){
                return redirect()->back()->with( "errores", $validator->errors()->all() )->withInput( $data->input() );
            }else{
                $model = new UsuariosModel();
                $result = $model->editarUsuario( $data );
                if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                    return redirect()->back()->with( "errores", array(
                        $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
                    ) );
                }else{
                    return redirect()->back()->with( "mensajes", array(
                        "Usuario actualizado exitosamente"
                    ) );
                }
            }
        }
    }

    public function eliminarUsuarios( Request $data ){
        $model = new UsuariosModel();
        $result = $model->eliminarUsuarios( $data );
        if ( $result[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
            return redirect()->back()->with( "errores", array(
                $result[ "codigo" ][ "descripcion" ] . ", " . $result[ "razon" ]
            ) );
        }else{
            return redirect()->back()->with( "mensajes", array(
                "Usuarios eliminados exitosamente"
            ) );
        }
    }
}