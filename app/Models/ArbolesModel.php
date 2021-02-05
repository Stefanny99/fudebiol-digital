<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
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
            $data['resultado'] = DB::table('fudebiol_arboles')->get();
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

    public function crearArbol( $request ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "crearArbol"
        );
        try {
            DB::begintransaction();
            try {
                $arbol_id = DB::table('fudebiol_arboles')->insertGetId([
                    'fa_nombre_cientifico' => $request->input('fa_nombre_cientifico'),
                    'fa_jiffys' => $request->input('fa_jiffys'),
                    'fa_bolsas' => $request->input('fa_bolsas'),
                    'fa_elevacion_minima' => $request->input('fa_elevacion_minima'),
                    'fa_elevacion_maxima' => $request->input('fa_elevacion_maxima'),
                ]);
                if ( $request->hasFile( 'imagenes' ) ){
                    foreach ( $request->file( "imagenes" ) as $imagen ){
                        try{
                            $imagen_id = DB::table( 'fudebiol_arboles_img' )->insertGetId( array(
                                "fai_arbol_id" => $arbol_id,
                                "fai_formato" => $imagen->extension()
                            ) );
                            try{
                                $imagen->storeAs( "public/img/fudebiol_arboles_img", $imagen_id . '.' . $imagen->extension() );
                            }catch ( Exception $e ){
                                $data[ "codigo" ] = Util::$codigos[ "ERROR_AL_SUBIR_ARHIVO" ];
                                $data[ "razon" ] = "Ocurrió un error al subir la imagen " . $imagen->getClientOriginalName();
                                Log::error( $e->getMessage(), $data );
                                DB::rollBack();
                                break;
                            }
                        }catch ( Exception $e ){
                            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_INSERCION" ];
                            $data[ "razon" ] = "Ocurrió un error al guardar la imagen " . $imagen->getClientOriginalName();
                            Log::error( $e->getMessage(), $data );
                            DB::rollBack();
                            break;
                        }
                    }
                    if ( $data[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                        DB::rollBack();
                    }else{
                        DB::commit();
                    }
                }else{
                    DB::commit();
                }
            } catch (Exception $e) {
                $data['codigo'] = Util::$codigos[ "ERROR_DE_INSERCION" ];
                $data['razon'] = "Ocurrió un error al insertar el árbol";
                Log::error( $e->getMessage(), $data );
                DB::rollBack();
            }    
        } catch (Exception $e) {
            $data['codigo'] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function editarArbol($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "editarArbol"
        );
        try{
            DB::begintransaction();
            try {
                DB::table('fudebiol_arboles')->where('fa_id',$request->input('fa_id'))
                ->update([
                    'fa_nombre_cientifico' => $request->input('fa_nombre_cientifico'),
                    'fa_jiffys' => $request->input('fa_jiffys'),
                    'fa_bolsas' => $request->input('fa_bolsas'),
                    'fa_elevacion_minima' => $request->input('fa_elevacion_minima'),
                    'fa_elevacion_maxima' => $request->input('fa_elevacion_maxima'), 
                ]);
                if ( $request->has( "imagenes_eliminadas" ) ){
                    try{
                        $imagenes = DB::table( "fudebiol_imagenes" )->wehereIn( 'fa_id', $request->input( "imagenes_eliminadas" ) )->get();
                        if ( count( $imagenes ) > 0 ){
                            try{
                                DB::table( "fudebiol_imagenes" )->wehereIn( "fa_id", $request->input( "imagenes_eliminadas" ) )->delete();
                                try{
                                    foreach ( $imagenes as $imagen ){
                                        Storage::delete( "public/img/fudebiol_arboles_img/" . $imagen->FA_ID . $imagen->FA_FORMATO );
                                    }
                                }catch ( Exception $e ){
                                    $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO_ARCHIVO" ];
                                    $data['razon'] = "Ocurrió un error al eliminar los archivos de imágenes";
                                    Log::error( $e->getMessage(), $data );
                                    DB::rollBack();
                                }
                            }catch ( Exception $e ){
                                $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
                                $data['razon'] = "Ocurrió un error al eliminar las imágenes";
                                Log::error( $e->getMessage(), $data );
                                DB::rollBack();
                            }
                        }
                    }catch ( Exception $e ){
                        $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
                        $data['razon'] = "Ocurrió un error al eliminar las imágenes";
                        Log::error( $e->getMessage(), $data );
                        DB::rollBack();
                    }
                }
                if ( $data[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                    if ( $request->hasFile( 'imagenes' ) ){
                        foreach ( $request->file( "imagenes" ) as $imagen ){
                            try{
                                $imagen_id = DB::table( 'fudebiol_arboles_img' )->insertGetId( array(
                                    "fai_arbol_id" => $arbol_id,
                                    "fai_formato" => $imagen->extension()
                                ) );
                                try{
                                    $imagen->storeAs( "public/img/fudebiol_arboles_img", $imagen_id . '.' . $imagen->extension() );
                                }catch ( Exception $e ){
                                    $data[ "codigo" ] = Util::$codigos[ "ERROR_SUBIENDO_ARHIVO" ];
                                    $data[ "razon" ] = "Ocurrió un error al subir la imagen " . $imagen->getClientOriginalName();
                                    Log::error( $e->getMessage(), $data );
                                    DB::rollBack();
                                    break;
                                }
                            }catch ( Exception $e ){
                                $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_INSERCION" ];
                                $data[ "razon" ] = "Ocurrió un error al guardar la imagen " . $imagen->getClientOriginalName();
                                Log::error( $e->getMessage(), $data );
                                DB::rollBack();
                                break;
                            }
                        }
                        if ( $data[ "codigo" ][ "codigo" ] != Util::$codigos[ "EXITO" ][ "codigo" ] ){
                            DB::rollBack();
                        }else{
                            DB::commit();
                        }
                    }else{
                        DB::commit();
                    }
                }
            } catch (Exception $e) {
                $data['codigo'] = Util::$codigos[ "ERROR_DE_ACTUALIZACION" ];
                $data['razon'] = "Ocurrió un error al editar el árbol";
                Log::error( $e->getMessage(), $data );
                DB::rollBack();
            } 
        }catch(Exception $e){
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }
}