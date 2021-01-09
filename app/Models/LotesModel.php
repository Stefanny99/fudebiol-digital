<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
Use Exception;

class LotesModel extends Model {

    public function obtenerArboles(){
        try{
           DB::table('fudebiol_lotes')->get();
        }catch(Exception $e){
            $data['resultado'] = "Error al obtener lotes. Por favor inténtelo nuevamente";
            $data['exito'] = false;
            return $data;
        }
    }

    public function eliminarLote($request){
        try{
            DB::table('fudebiol_lotes')->where('fl_id', $request->input('lote_id'))->delete();
            $data['resultado'] = "¡Registro eliminado con éxito! ";
            $data['exito'] = true;
        }catch(Exception $e){
            $data['resultado'] = "Error al eliminar registro. Por favor inténtelo nuevamente";
            $data['exito'] = false;
        }
        return $data;
    }

    public function crearLote($request){
        try {
            DB::table('fudebiol_lotes')->insert([
                'fl_nombre' => $request->input('nombre_lote'),
                'fl_tamano' => $request->input('tamano_lote'),
                'fl_filas' => $request->input('filas_lote'),
                'fl_columnas' => $request->input('columnas_lote')
            ]);
            $data['resultado'] = "¡Datos insertados con éxito!";
            $data['exito'] = true;
        } catch (Exception $e) {
            $data['resultado'] = "Error. No se pudo insertar el registro, por favor intentelo nuevamente."; 
            $data['exito'] = false;
        }
        return $data;
    }

    public function editarLote($request){
        try{
            DB::table('fudebiol_lotes')->where('fl_id',$request->input('lote_id'))
            ->update([
                'fl_nombre' => $request->input('nombre_lote'),
                'fl_tamano' => $request->input('tamano_lote'),
                'fl_filas' => $request->input('filas_lote'),
                'fl_columnas' => $request->input('columnas_lote')
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