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
        }
        return $data;
    }

    public function eliminarUsuario($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "eliminarUsuario"
        );
        try{
            DB::table('users')->where('id', $request->input('usuario_id'))->delete();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_ELIMINANDO" ];
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
            $dta['resultado'] = DB::table('users')->insertGetId([ // retorna el id del usuario insertado
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
            DB::table('users')->where('id',$request->input('usuario_id'))
            ->update([
                'name' => $request->input('nombre_completo'),
                'username' => $request->input('nombre_usuario'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('contrasena')),
                'role' => $request->input('rol'),
                'updated_at' => date('Y-m-d H:i:s') 
            ]);
        }catch(Exception $e){
            $data['codigo'] = Util::$codigos[ "ERROR_DE_INSERCION" ];
        }
        return $data;
    }
}