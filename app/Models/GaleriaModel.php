<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

class GaleriaModel extends Model {
    public function obtenerImagenes(){
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

    public function agregarImagen( $request ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "agregarImagen"
        );
        if ( $request->hasFile( 'imagen' ) ){
            DB::begintransaction();
            try{
                $imagen_id = DB::table('fudebiol_imagenes')->insertGetId([
                    'fi_descripcion' => $request->input('fi_descripcion'),
                    'fi_formato' => $request->file( 'imagen' )->extension(),
                ]);
                try{
                    $data['resultado'] = DB::table('fudebiol_galeria')->insertGetId(['fg_imagen_id' => $imagen_id]);
                    try{
                        $request->file( 'imagen' )->storeAs( "public/img/fudebiol_galeria/", $imagen_id . '.' . $request->file( 'imagen' )->extension() );
                        DB::commit();
                    } catch( Exception $e ){
                        $data[ "codigo" ] = Util::$codigos[ "ERROR_SUBIENDO_ARHIVO" ];
                        $data[ "razon" ] = "Ocurrió un error al subir la imagen " . $request->file( 'imagen' )->getClientOriginalName();
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
        return $data;  
    }   
    
    public function eliminarImagen($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "eliminarImagen"
        );
        try {
            $imagen = DB::table( "fudebiol_imagenes" )->where( 'fi_id', $request->input( "fi_id" ) )->get();
            if ( $imagen ) {
                DB::begintransaction();
                try {
                    DB::table( "fudebiol_imagenes" )->where( "fi_id", $request->input( "fi_id" ) )->delete();
                    try {
                        DB::table( "fudebiol_galeria" )->wehereIn( "fg_imagen_id", $request->input( "fi_id" ) )->delete();
                        try{
                            Storage::delete( "public/img/fudebiol_galeria/" . $request->input('fi_id') . $imagen->FI_FORMATO );
                            DB::commit();
                        }catch ( Exception $e ){
                            $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO_ARCHIVO" ];
                            $data['razon'] = "Ocurrió un error al eliminar archivo";
                            Log::error( $e->getMessage(), $data );
                            DB::rollBack();
                        }
                    } catch (Exception $e){
                        $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
                        $data['razon'] = "Ocurrió un error al eliminar la imagen en galería";
                        Log::error( $e->getMessage(), $data );
                        DB::rollBack();
                    }
                } catch (Exception $e){
                    $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
                    $data['razon'] = "Ocurrió un error al eliminar la imagen";
                    Log::error( $e->getMessage(), $data );
                    DB::rollBack();
                }
            } else {
                $data['codigo'] = Util::$codigos[ "NO_ENCONTRADO" ];
            }   
        } catch(Exception $e){
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }          
        return $data;
    }

    public function editarImagen($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "editarImagen"
        );
        try {
            DB::table('fudebiol_imagenes')
            ->where('fi_id',$request->input('fi_id'))
            ->update(['fi_descripcion' => $request->input('fi_descripcion')]);
        } catch (Exception $e) {
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
        Log::error( $e->getMessage(), $data );
        } 
        return $data;
    }
}