<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

class GaleriaModel extends Model {
    public function obtenerImagenes( ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerImagenes"
        );
        try{
            $data['resultado'] = DB::table('fudebiol_galeria')
                                    ->join('fudebiol_imagenes', 'fudebiol_galeria.fg_imagen_id', '=', 'fudebiol_imagenes.fi_id')
                                    ->select('fudebiol_imagenes.*')
                                    ->get();
        }catch(Exception $e){
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function agregarImagenes( $request ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "agregarImagenes"
        );
        if ( $request->hasFile( 'imagenes' ) ){
            try {
                DB::begintransaction();
                foreach ( $request->file( "imagenes" ) as $imagen ){
                    try{
                        $imagen_id = DB::table('fudebiol_imagenes')->insertGetId([
                            'fi_descripcion' => $request->input('fi_descripcion'),
                            'fi_formato' => $request->file( 'imagen' )->extension(),
                        ]);
                        try{
                            $data['resultado'] = DB::table('fudebiol_galeria')->insertGetId([
                                'fg_imagen_id' => $imagen_id
                            ]);
                            try{
                                $request->file( 'imagen' )->storeAs( "public/img/fudebiol_galeria/", $imagen_id . '.' . $request->file( 'imagen' )->extension() );
                                DB::commit();
                            } catch( Exception $e ){
                                $data[ "codigo" ] = Util::$codigos[ "ERROR_SUBIENDO_ARHIVO" ];
                                $data[ "razon" ] = "Ocurrió un error al subir la imagen " . $imagen->getClientOriginalName();
                                Log::error( $e->getMessage(), $data );
                                DB::rollBack();
                            } 
                        } catch ( Exception $e ){
                            $data[ "codigo" ] = Util::$codigos[ "ERROR_SUBIENDO_ARHIVO" ];
                            $data[ "razon" ] = "Ocurrió un error al guardar en galería ";
                            Log::error( $e->getMessage(), $data );
                            DB::rollBack();
                        }
                    } catch (Exception $e) {
                        $data['codigo'] = Util::$codigos[ "ERROR_DE_INSERCION" ];
                        $data['razon'] = "Ocurrió un error al guardar la imagen" . $imagen->getClientOriginalName();
                        Log::error( $e->getMessage(), $data );
                        DB::rollBack();
                    }
                }
            } catch (Exception $e) {
                $data['codigo'] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
                Log::error( $e->getMessage(), $data );
            }
        }
        return $data;  
    }   
    
    public function eliminarImagen($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "eliminarImagen"
        );
        if ( $request->hasFile( 'imagenes_eliminadas' ) ){
            try {
                $imagenes = DB::table( "fudebiol_imagenes" )->wehereIn( 'fi_id', $request->input( "imagenes_eliminadas" ) )->get();
                if ( count( $imagenes ) > 0 ){
                    try {
                        DB::table( "fudebiol_imagenes" )->wehereIn( "fi_id", $request->input( "imagenes_eliminadas" ) )->delete();
                        try {
                            DB::table( "fudebiol_galeria" )->wehereIn( "fg_imagen_id", $request->input( "imagenes_eliminadas" ) )->delete();
                            try{
                                foreach ( $imagenes as $imagen ){
                                    Storage::delete( "public/img/fudebiol_galeria/" . $imagen->FI__ID . $imagen->FI_FORMATO );
                                }
                                DB::commit();
                            }catch ( Exception $e ){
                                $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO_ARCHIVO" ];
                                $data['razon'] = "Ocurrió un error al eliminar la imagen";
                                Log::error( $e->getMessage(), $data );
                                DB::rollBack();
                            }
                        }catch (Exception $e){
                            $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
                            $data['razon'] = "Ocurrió un error al eliminar las imagenes de galería";
                            Log::error( $e->getMessage(), $data );
                            DB::rollBack();
                        }
                    } catch (Exception $e){
                        $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
                        $data['razon'] = "Ocurrió un error al eliminar las imágenes";
                        Log::error( $e->getMessage(), $data );
                        DB::rollBack();
                    }
                }
            } catch(Exception $e){
                DB::rollBack();
                $data[ 'codigo' ] = Util::$codigos[ "ERROR_ELIMINANDO" ];
            }
        }            
        return $data;
    }
}