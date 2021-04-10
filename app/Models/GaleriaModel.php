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
            "accion" => "GaleriaModel:obtenerImagenes"
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
            "errores" => array(),
            "accion" => "GaleriaModel:agregarImagenes"
        );
        $imagenes = $request->file( "fotos" );
        $descripciones = $request->input( "descripciones" );
        for ( $i = 0; $i < count( $imagenes ); ++$i ){
            try{
                $imagen_id = DB::table( "fudebiol_imagenes" )->insertGetId( [
                    "fi_descripcion" => $descripciones[ $i ],
                    "fi_formato" => $imagenes[ $i ]->extension()
                ] );
                DB::table( "fudebiol_galeria" )->insertGetId( [ "fg_imagen_id" => $imagen_id ] );
                try{
                    $imagenes[ $i ]->storeAs( "public/img/fudebiol_imagenes/", $imagen_id . "." . $imagenes[ $i ]->extension() );
                }catch ( Exception $e ){
                    array_push($data['errores'], "Ocurrió un error al subir la imagen " . $imagenes[ $i ]->getClientOriginalName());
                    Log::error( $e->getMessage(), $data );
                }
            }catch ( Exception $e ){
                array_push($data['errores'], "Error al guardar la imagen " . $imagenes[ $i ]->getClientOriginalName() . " en la base de datos");
                Log::error( $e->getMessage(), $data );
            }
        }
        return $data;  
    }   
    
    public function eliminarImagen($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "GaleriaModel:eliminarImagen"
        );
        try {
            $imagen = DB::table( "fudebiol_imagenes" )->where( 'fi_id', $request->input( "fi_id" ) )->get();
            if ( $imagen ) {
                DB::begintransaction();
                try {
                    DB::table( "fudebiol_galeria" )->where( "fg_imagen_id", $request->input( "fi_id" ) )->delete();
                    DB::table( "fudebiol_imagenes" )->where( "fi_id", $request->input( "fi_id" ) )->delete();
                    try{
                        Storage::delete( "public/img/fudebiol_imagenes/" . $request->input('fi_id') . "." . $request->input( "fi_formato" ) );
                        DB::commit();
                    }catch ( Exception $e ){
                        $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO_ARCHIVO" ];
                        $data['razon'] = "Ocurrió un error al eliminar archivo";
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
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_ACTUALIZACION" ];
            Log::error( $e->getMessage(), $data );
        } 
        return $data;
    }
}