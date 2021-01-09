<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
Use Exception;

class PadrinosArbolesModel extends Model {

    public function obtenerPadrinosArbol($request){
        try{
           DB::table('fudebiol_padrinos_arboles')->where('fpa_arbol_lote_id', $request->input('arbol_lote_id'))->get();
        }catch(Exception $e){
            $data['resultado'] = "Error al obtener padrinos. Por favor inténtelo nuevamente";
            $data['exito'] = false;
            return $data;
        }
    }

    public function eliminarPadrinoArbol($request){
        try{
            DB::table('fudebiol_padrinos_arboles')->where('fpa_id', $request->input('padrino_arbol_id'))->delete();
            $data['resultado'] = "¡Registro eliminado con éxito! ";
            $data['exito'] = true;
        }catch(Exception $e){
            $data['resultado'] = "Error al eliminar registro. Por favor inténtelo nuevamente";
            $data['exito'] = false;
        }
        return $data;
    }

    public function crearPadrinoArbol($request){
        try {
            DB::table('fudebiol_padrinos_arboles')->insert([
                'fpa_padrino_id' => $request->input('padrino_id'),
                'fpa_arbol_lote_id' => $request->input('arbol_lote_id'),
                'fpa_fecha_adopcion' => date('Y-m-d H:i:s'),
                'fpa_estado' => $request->input('estado')
            ]);
            $data['resultado'] = "¡Datos insertados con éxito!";
            $data['exito'] = true;
        } catch (Exception $e) {
            $data['resultado'] = "Error. No se pudo insertar el registro, por favor intentelo nuevamente."; 
            $data['exito'] = false;
        }
        return $data;
    }

    public function editarPadrinoArbol($request){
        try{
            DB::table('fudebiol_padrinos_arboles')->where('fpa_id',$request->input('lote_id'))
            ->update([
                'fpa_padrino_id' => $request->input('padrino_id'),
                'fpa_arbol_lote_id' => $request->input('arbol_lote_id'),
                'fpa_fecha_adopcion' => date('Y-m-d H:i:s'),
                'fpa_estado' => $request->input('estado')
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