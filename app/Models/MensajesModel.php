<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
Use Exception;

class MensajesModel extends Model {

    public function obtenerMensajes($request){
        try{
           DB::table('fudebiol_mensajes')->get();
        }catch(Exception $e){
            $data['resultado'] = "Error al obtener mensajes. Por favor inténtelo nuevamente";
            $data['exito'] = false;
            return $data;
        }
    }

    public function obtenerMensajesNoLeidos(){
        try{
           DB::table('fudebiol_mensajes')->where('fm_estado', 1)->get();
        }catch(Exception $e){
            $data['resultado'] = "Error al obtener mensajes. Por favor inténtelo nuevamente";
            $data['exito'] = false;
            return $data;
        }
    }

    public function eliminarMensaje($request){
        try{
            DB::table('fudebiol_mensajes')->where('fm_id', $request->input('mensaje_id'))->delete();
            $data['resultado'] = "¡Registro eliminado con éxito! ";
            $data['exito'] = true;
        }catch(Exception $e){
            $data['resultado'] = "Error al eliminar registro. Por favor inténtelo nuevamente";
            $data['exito'] = false;
        }
        return $data;
    }

    public function marcarMensajeComoLeido($request){
        try{
            DB::table('fudebiol_mensajes')->where('fm_id', $request->input('mensaje_id'))
            ->update(['fm_estado' => 0]);
            $data['resultado'] = "¡Registro actualizado con éxito! ";
            $data['exito'] = true;
        }catch(Exception $e){
            $data['resultado'] = "Error al eliminar registro. Por favor inténtelo nuevamente";
            $data['exito'] = false;
        }
        return $data;
    }

    public function crearMensaje($request){
        try {
            DB::table('fudebiol_mensajes')->insert([
                'fm_correo' => $request->input('correo'),
                'fm_telefono' => $request->input('telefono'),
                'fm_texto' => $request->input('mensaje_texto'),
                'fm_estado' => 1
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