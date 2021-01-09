<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
Use Exception;

class PadrinosModel extends Model {

    public function obtenerPadrinos(){
        try{
            return DB::table('fudebiol_padrinos')->get();
        }catch(Exception $e){
            $data['resultado'] = "Error al obtener padrinos. Por favor inténtelo nuevamente";
            $data['exito'] = false;
            return $data;
        }
    }

    public function obtenerPadrinoPorCedula($request){
        try{
            return DB::table('fudebiol_padrinos')->where('fp_cedula', $request->input('cedula'))->first();
        }catch(Exception $e){
            $data['resultado'] = "Error al obtener dato. Por favor inténtelo nuevamente";
            $data['exito'] = false;
            return $data;
        }
    }

    public function eliminarPadrino($request){
        try{
            DB::table('fudebiol_padrinos')->where('fp_id', $request->input('padrino_id'))->delete();
            $data['resultado'] = "¡Registro eliminado con éxito! ";
            $data['exito'] = true;
        }catch(Exception $e){
            $data['resultado'] = "Error al eliminar registro. Por favor inténtelo nuevamente";
            $data['exito'] = false;
        }
        return $data;
    }

    public function crearPadrino($request){
        try {
            DB::table('fudebiol_padrinos')->insert([
                'fp_cedula' => $request->input('cedula'),
                'fp_nombre1' => $request->input('nombre1'),
                'fp_nombre2' => $request->input('nombre2'),
                'fp_apellido1' => $request->input('apellido1'),
                'fp_apellido2' => $request->input('apellido2'),
                'fp_tipo' => $request->input('tipo')
            ]);
            $data['resultado'] = "¡Datos insertados con éxito!";
            $data['exito'] = true;
        } catch (Exception $e) {
            $data['resultado'] = "Error. No se pudo insertar el registro, por favor intentelo nuevamente."; 
            $data['exito'] = false;
        }
        return $data;
    }

    public function editarPadrino($request){
        try{
            DB::table('fudebiol_padrinos')->where('fp_id',$request->input('padrino_id'))
            ->update([
                'fp_cedula' => $request->input('cedula'),
                'fp_nombre1' => $request->input('nombre1'),
                'fp_nombre2' => $request->input('nombre2'),
                'fp_apellido1' => $request->input('apellido1'),
                'fp_apellido2' => $request->input('apellido2'),
                'fp_tipo' => $request->input('tipo')
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