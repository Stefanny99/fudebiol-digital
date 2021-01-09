<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
Use Exception;

class ArbolesModel extends Model {

    public function obtenerArboles(){
        try{
            $data = array(
                'arboles'  => DB::table('fudebiol_arboles')->get(),
                'arboles_img' => DB::table('fudebiol_arboles_img')->get(),
            );
        }catch(Exception $e){
            $data['resultado'] = "Error al obtener los árboles. Por favor inténtelo nuevamente";
            $data['exito'] = false;
            return $data;
        }
    }

    // public function obtenerArbolesPor(){
    //     try{
    //         return DB::table('fudebiol_arboles')->get();
    //     }catch(Exception $e){
    //         $data['resultado'] = "Error al obtener los árboles. Por favor inténtelo nuevamente";
    //         $data['exito'] = false;
    //         return $data;
    //     }
    // }

    public function eliminarArbol($request){
        try{
            DB::table('fudebiol_arboles')->where('fa_id', $request->input('arbol_id'))->delete();
            DB::table('fudebiol_arboles_img')->where('fa_arbol_id', $request->input('arbol_id'))->delete();
            $data['resultado'] = "¡Registro eliminado con éxito! ";
            $data['exito'] = true;
        }catch(Exception $e){
            $data['resultado'] = "Error al eliminar registro. Por favor inténtelo nuevamente";
            $data['exito'] = false;
        }
        return $data;
    }

    public function crearArbol($request, $nombre_foto){
        try {
            $date = date('Y-m-d H:i:s');
            $arbol_id = DB::table('fudebiol_arboles')->insertGetId([
                'fa_nombre_cientifico' => $request->input('nombre_cientifico'),
                'fa_jiffys' => $request->input('jiffys'),
                'fa_bolsas' => $request->input('bolsas'),
                'fa_elevacion_minima' => Hash::make($request->input('elevacion_minima')),
                'fa_elevacion_maxima' => $request->input('elevacion_maxima'),
            ]);
            if ($arbol_id > 0 && $nombre_foto !== ''){ 
                DB::table('fudebiol_arboles_img')->insert([
                    'fai_arbol_id' => $arbol_id,
                    'fai_img_nombre' => $nombre_foto,
                ]);
            }
            $data['resultado'] = "¡Datos insertados con éxito!";
            $data['exito'] = true;
        } catch (Exception $e) {
            $data['resultado'] = "Error. No se pudo insertar el registro, por favor intentelo nuevamente."; 
            $data['exito'] = false;
        }
        return $data;
    }

    public function editarArbol($request){
        try{
            $arbol_editado = DB::table('fudebiol_arboles')->where('id',$request->input('usuario_id'))
            ->update([
                'fa_nombre_cientifico' => $request->input('nombre_cientifico'),
                'fa_jiffys' => $request->input('jiffys'),
                'fa_bolsas' => $request->input('bolsas'),
                'fa_elevacion_minima' => Hash::make($request->input('elevacion_minima')),
                'fa_elevacion_maxima' => $request->input('elevacion_maxima'), 
            ]);
            if ($arbol_editado->fa_id > 0 && $nombre_foto !== ''){ 
                DB::table('fudebiol_arboles_img')->update([
                    'fai_img_nombre' => $nombre_foto,
                ]);
            }
            $data['resultado'] = "¡Registro actualizado con éxito! ";
            $data['exito'] = true;
        }catch(Exception $e){
            $data['resultado'] = "Error al actualizar registro. Por favor inténtelo nuevamente";
            $data['exito'] = false;
        }
        return $data;
    }
}