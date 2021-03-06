<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
Use Exception;

use App\Helper\Util;

use Illuminate\Database\Eloquent\Model;

class UsuariosModel extends Model {

    public function obtenerUsuarios(){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerUsuarios"
        );
        try{
            $data['resultado'] = DB::table('users')->get();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function eliminarUsuarios($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "eliminarUsuarios"
        );
        try{
            DB::table('users')->whereIn('id', $request->input('ids'))->delete();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_ELIMINANDO" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function crearUsuario($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "crearUsuario"
        );
        try {
            $date = date('Y-m-d H:i:s');
            $data['resultado'] = DB::table('users')->insertGetId([ // retorna el id del usuario insertado
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => $request->input('role'),
                'created_at' => $date, 
                'updated_at' => $date
            ]);
        } catch (Exception $e) {
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_INSERCION" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function editarUsuario($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "editarUsuario"
        );
        try{
            $user_data = array(
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            if ( $request->has( "password" ) && strlen( trim( $request->input( "password" ) ) ) > 0 ){
                $user_data[ 'password' ] = Hash::make( $request->input( 'password' ) );
            }
            DB::table('users')->where('id',$request->input('id'))->update( $user_data );
        }catch(Exception $e){
            $data['codigo'] = Util::$codigos[ "ERROR_DE_ACTUALIZACION" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }
}