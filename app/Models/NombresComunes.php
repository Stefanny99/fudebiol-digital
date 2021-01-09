<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
Use Exception;

class NombresComunesModel extends Model {

    public function obtenerNombresComunes($request){
        try{
           DB::table('fudebiol_nombres_comunes')->get();
        }catch(Exception $e){
            $data['resultado'] = "Error al obtener nombres comunes de árboles. Por favor inténtelo nuevamente";
            $data['exito'] = false;
            return $data;
        }
    }

    public function obtenerNombresComunesPorArbol($request){
        try{
           DB::table('fudebiol_nombres_comunes')->where('fnc_arbol_id', $request->input('arbol_id'))->get();
        }catch(Exception $e){
            $data['resultado'] = "Error al obtener nombres comunes del árbol indicado. Por favor inténtelo nuevamente";
            $data['exito'] = false;
            return $data;
        }
    }

    public function eliminarNombreComun($request){
        try{
            DB::table('fudebiol_nombres_comunes')->where('fnc_id', $request->input('nombre_comun_id'))->delete();
            $data['resultado'] = "¡Registro eliminado con éxito! ";
            $data['exito'] = true;
        }catch(Exception $e){
            $data['resultado'] = "Error al eliminar registro. Por favor inténtelo nuevamente";
            $data['exito'] = false;
        }
        return $data;
    }

    public function crearNombreComun($request){
        try {
            DB::table('fudebiol_nombres_comunes')->insert([
                'fnc_arbol_id' => $request->input('arbol_id'),
                'fnc_nombre' => $request->input('nombre'),
            ]);
            $data['resultado'] = "¡Datos insertados con éxito!";
            $data['exito'] = true;
        } catch (Exception $e) {
            $data['resultado'] = "Error. No se pudo insertar el registro, por favor intentelo nuevamente."; 
            $data['exito'] = false;
        }
        return $data;
    }

    public function editarNombreComun($request){
        try {
            DB::table('fudebiol_nombres_comunes')->update([
                'fnc_arbol_id' => $request->input('arbol_id'),
                'fnc_nombre' => $request->input('nombre'),
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