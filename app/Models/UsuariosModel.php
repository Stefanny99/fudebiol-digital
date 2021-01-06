<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
Use Exception;

class UsuariosModel extends Model {

    public function obtenerUsuarios(){
        try{
            return DB::table('users')->get();
        }catch(Exception $e){
            $data['resultado'] = "Error al obtener usuarios. Por favor inténtelo nuevamente";
            $data['exito'] = false;
            return $data;
        }
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
}