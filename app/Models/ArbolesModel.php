<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

class ArbolesModel extends Model {
    public function obtenerArboles( $pagina, $nombre_arbol ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerArboles"
        );
        try{
            $data['resultado'] = DB::table('fudebiol_arboles')
            ->where('fa_nombre_cientifico', 'like', '%'.$nombre_arbol.'%')
            ->orWhere('fa_nombres_comunes', 'like', '%'.$nombre_arbol.'%')
            ->skip( ( $pagina - 1 ) * 8 )->take( 8 )->get();
        }catch(Exception $e){
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

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
                    'fa_imagen_formato' => $request->hasFile( 'imagen' ) ? $request->file( "imagen" )->extension() : '',
                    'fa_nombres_comunes' => $request->input('fa_nombres_comunes'),
                ]);
                if ( $request->hasFile( 'imagen' ) ){
                    try{
                        $request->file( 'imagen' )->storeAs( "public/img/fudebiol_arboles_img", $arbol_id . '.' . $request->file( 'imagen' )->extension() );
                        DB::commit();
                    }catch ( Exception $e ){
                        $data[ "codigo" ] = Util::$codigos[ "ERROR_SUBIENDO_ARHIVO" ];
                        $data[ "razon" ] = "Ocurrió un error al subir la imagen " . $imagen->getClientOriginalName();
                        Log::error( $e->getMessage(), $data );
                        DB::rollBack();
                    }
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
                    'fa_imagen_formato' => $request->hasFile( 'imagen' ) ? $request->file( "imagen" )->extension() : '',
                    'fa_nombres_comunes' => $request->input('fa_nombres_comunes'),
                ]);
                if ( $request->hasFile( 'imagen' ) ){
                    try{
                        $request->file( 'imagen' )->storeAs( "public/img/fudebiol_arboles_img", $arbol_id . '.' . $request->file( 'imagen' )->extension() );
                        DB::commit();
                        if ( $request->file( 'imagen' )->extension() != $request->input( 'fa_imagen_formato' ) ){
                            try{
                                Storage::delete( "public/img/fudebiol_arboles_img/" . $request->input( 'fa_id' ) . "." . $request->input( 'fa_imagen_formato' ) );
                            }catch ( Exception $e ){
                                Log::error( $e->getMessage(), array(
                                    'codigo' => Util::$codigos[ "ERROR_ELIMINANDO_ARCHIVO" ],
                                    'razon' => "Ocurrió un error al eliminar la imagen 'public/img/fudebiol_arboles_img/" . $request->input( 'fa_id' ) . "." . $request->input( 'fa_imagen_formato' ) . "'",
                                ) );
                            }
                        }
                    }catch( Exception $e ){
                        $data[ "codigo" ] = Util::$codigos[ "ERROR_SUBIENDO_ARHIVO" ];
                        $data[ "razon" ] = "Ocurrió un error al subir la imagen " . $imagen->getClientOriginalName();
                        Log::error( $e->getMessage(), $data );
                        DB::rollBack();
                    }
                } else {
                    DB::commit();
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