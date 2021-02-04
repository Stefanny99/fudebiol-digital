<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
Use Exception;

use App\Helper\Util;
class ArbolesModel extends Model {

    public function obtenerArboles(){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerArboles"
        );
        try{
            $data['resultado'] = DB::table('fudebiol_arbole')->get();
        }catch(Exception $e){
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
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
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "eliminarArbol"
        );
        try{
            DB::begintransaction();
            try {
                DB::table('fudebiol_arboles')->where('fa_id', $request->input('arbol_id'))->delete();
                try {
                    DB::table('fudebiol_arboles_img')->where('fa_arbol_id', $request->input('arbol_id'))->delete();
                    DB::commit(); 
                } catch(Exception $e){
                    $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
                    $data['razon'] = "Ocurrió un error al eliminar la imagen del árbol";
                    DB::rollBack();
                }   
            } catch (Exception $e) {
                $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
                $data['razon'] = "Ocurrió un error al eliminar el árbol";
                DB::rollBack();
            }    
        }catch(Exception $e){
            DB::rollBack();
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_ELIMINANDO" ];
        }
        return $data;
    }

    public function crearArbol($request, $nombre_foto){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "crearArbol"
        );
        try {
            DB::begintransaction();
            try {
                $arbol_id = DB::table('fudebiol_arboles')->insertGetId([
                    'fa_nombre_cientifico' => $request->input('nombre_cientifico'),
                    'fa_jiffys' => $request->input('jiffys'),
                    'fa_bolsas' => $request->input('bolsas'),
                    'fa_elevacion_minima' => $request->input('elevacion_minima'),
                    'fa_elevacion_maxima' => $request->input('elevacion_maxima'),
                ]);
                try {
                    if ($arbol_id > 0 && $nombre_foto !== ''){ 
                        DB::table('fudebiol_arboles_img')->insert([
                            'fai_arbol_id' => $arbol_id,
                            'fai_img_nombre' => $nombre_foto,
                        ]);
                    } 
                    DB::commit(); 
                } catch(Exception $e){
                    $data['codigo'] = Util::$codigos[ "ERROR_DE_INSERCION" ];
                    $data['razon'] = "Ocurrió un error al insertar la imagen del árbol";
                    DB::rollBack();
                }   
            } catch (Exception $e) {
                $data['codigo'] = Util::$codigos[ "ERROR_DE_INSERCION" ];
                $data['razon'] = "Ocurrió un error al insertar el árbol";
                DB::rollBack();
            }    
        } catch (Exception $e) {
            DB::rollBack();
            $data['codigo'] = Util::$codigos[ "ERROR_DE_INSERCION" ];
        }
        return $data;
    }

    public function editarArbol($request, $nombre_foto){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "editarArbol"
        );
        try{
            DB::begintransaction();
            try {
                DB::table('fudebiol_arboles')->where('fa_id',$request->input('arbol_id'))
                ->update([
                    'fa_nombre_cientifico' => $request->input('nombre_cientifico'),
                    'fa_jiffys' => $request->input('jiffys'),
                    'fa_bolsas' => $request->input('bolsas'),
                    'fa_elevacion_minima' => $request->input('elevacion_minima'),
                    'fa_elevacion_maxima' => $request->input('elevacion_maxima'), 
                ]);
                try {
                    if ($nombre_foto !== ''){ 
                        DB::table('fudebiol_arboles_img')->update([
                            'fai_img_nombre' => $nombre_foto,
                        ]);
                    }
                    DB::commit(); 
                } catch(Exception $e){
                    $data['codigo'] = Util::$codigos[ "ERROR_DE_INSERCION" ];
                    $data['razon'] = "Ocurrió un error al insertar la imagen del árbol";
                    DB::rollBack();
                }   
            } catch (Exception $e) {
                $data['codigo'] = Util::$codigos[ "ERROR_DE_INSERCION" ];
                $data['razon'] = "Ocurrió un error al editar el árbol";
                DB::rollBack();
            } 
        }catch(Exception $e){
            DB::rollBack();
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_INSERCION" ];
        }
        return $data;
    }
}