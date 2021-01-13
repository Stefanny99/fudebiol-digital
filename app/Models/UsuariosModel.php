<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
Use Exception;

use Illuminate\Database\Eloquent\Model;

class UsuariosModel extends Model {

    public function obtenerUsuarios(){
        $data = array(
            "codigo" => 0,
            "accion" => "obtenerUsuarios",
            "razon" => ""
        );
        try{
            $data['resultado'] = DB::table('users')->get();
        }catch(Exception $e){
            $data[ 'codigo' ] = 1;
        }
        return $data;
    }

    public function eliminarUsuario($request){
        try{
            DB::table('users')->where('id', $request->input('usuario_id'))->delete();
            $data['resultado'] = "¡Registro eliminado con éxito! ";
            $data['exito'] = true;
        }catch(Exception $e){
            $data['resultado'] = "Error al eliminar registro. Por favor inténtelo nuevamente";
            $data['exito'] = false;
        }
        return $data;
    }

    public function crearUsuario($request){
        try {
            $date = date('Y-m-d H:i:s');
            DB::table('users')->insert([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => $request->input('role'),
                'created_at' => $date, 
                'updated_at' => $date
            ]);
            $data['resultado'] = "¡Datos insertados con éxito!";
            $data['exito'] = true;
        } catch (Exception $e) {
            $data['resultado'] = "Error. No se pudo insertar el registro, por favor intentelo nuevamente."; 
            $data['exito'] = false;
        }
        return $data;
    }

    public function editarUsuario($request){
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
            $data['resultado'] = "¡Registro actualizado con éxito! ";
            $data['exito'] = true;
        }catch(Exception $e){
            $data['resultado'] = "Error al actualizar registro. Por favor inténtelo nuevamente";
            $data['exito'] = false;
        }
        return $data;
    }
}