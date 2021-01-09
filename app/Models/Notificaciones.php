<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
Use Exception;

class NotificacionesModel extends Model {

    public function obtenerNotificaciones($request){
        try{
           DB::table('fudebiol_notificaciones')->get();
        }catch(Exception $e){
            $data['resultado'] = "Error al obtener notificaciones. Por favor inténtelo nuevamente";
            $data['exito'] = false;
            return $data;
        }
    }

    public function obtenerNotificacionesNoLeidas(){
        try{
           DB::table('fudebiol_notificaciones')->where('fn_estado', 1)->get();
        }catch(Exception $e){
            $data['resultado'] = "Error al obtener notificaciones. Por favor inténtelo nuevamente";
            $data['exito'] = false;
            return $data;
        }
    }

    public function eliminarNotificacion($request){
        try{
            DB::table('fudebiol_notificaciones')->where('fn_id', $request->input('notificacion_id'))->delete();
            $data['resultado'] = "¡Registro eliminado con éxito! ";
            $data['exito'] = true;
        }catch(Exception $e){
            $data['resultado'] = "Error al eliminar registro. Por favor inténtelo nuevamente";
            $data['exito'] = false;
        }
        return $data;
    }

    public function marcarNotificacionComoLeida($request){
        try{
            DB::table('fudebiol_notificaciones')->where('fn_id', $request->input('notificacion_id'))
            ->update(['fn_estado' => 0]);
            $data['resultado'] = "¡Registro actualizado con éxito! ";
            $data['exito'] = true;
        }catch(Exception $e){
            $data['resultado'] = "Error al eliminar registro. Por favor inténtelo nuevamente";
            $data['exito'] = false;
        }
        return $data;
    }

    public function crearNotificacion($request){
        try {
            DB::table('fudebiol_notificaciones')->insert([
                'fn_fecha' => date('Y-m-d H:i:s'),
                'fn_desecripcion' => $request->input('descripcion'),
                'fn_tipo' => $request->input('notificacion_tipo'),
                'fn_estado' => 1
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