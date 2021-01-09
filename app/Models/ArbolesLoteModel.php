<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
Use Exception;

class LotesModel extends Model {

    public function obtenerArbolesPorLote($request){
        try{
           DB::table('fudebiol_arboles_lote')->where('fal_lote_id', $request->input('lote_id'))->get();
        }catch(Exception $e){
            $data['resultado'] = "Error al obtener los arboles del lote indicado. Por favor inténtelo nuevamente";
            $data['exito'] = false;
            return $data;
        }
    }

    public function eliminarArbolLote($request){
        try{
            DB::table('fudebiol_arboles_lote')->where('fal_id', $request->input('arbol_lote_id'))->delete();
            $data['resultado'] = "¡Registro eliminado con éxito! ";
            $data['exito'] = true;
        }catch(Exception $e){
            $data['resultado'] = "Error al eliminar registro. Por favor inténtelo nuevamente";
            $data['exito'] = false;
        }
        return $data;
    }

    public function crearArbolLote($request){
        try {
            DB::table('fudebiol_arboles_lote')->insert([
                'fal_arbol_id' => $request->input('arbol_id'),
                'fal_lote_id' => $request->input('lote_id'),
                'fal_coordenada_W' => $request->input('coordenada_W'),
                'fal_coordenada_N' => $request->input('coordenada_N'),
                'fal_fila' => $request->input('numero_fila'),
                'fal_columna' => $request->input('numero_columna')
            ]);
            $data['resultado'] = "¡Datos insertados con éxito!";
            $data['exito'] = true;
        } catch (Exception $e) {
            $data['resultado'] = "Error. No se pudo insertar el registro, por favor intentelo nuevamente."; 
            $data['exito'] = false;
        }
        return $data;
    }

    public function editarArbolLote($request){
        try{
            DB::table('fudebiol_arboles_lote')->where('fal_id',$request->input('arbol_lote_id'))
            ->update([
                'fal_arbol_id' => $request->input('arbol_id'),
                'fal_lote_id' => $request->input('lote_id'),
                'fal_coordenada_W' => $request->input('coordenada_W'),
                'fal_coordenada_N' => $request->input('coordenada_N'),
                'fal_fila' => $request->input('numero_fila'),
                'fal_columna' => $request->input('numero_columna')
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