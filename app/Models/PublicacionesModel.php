<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

class PublicacionesModel extends Model {
    public function obtenerPublicacion( $id ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "PublicacionesModel:obtenerPublicacion"
        );
        try{
            $data[ "resultado" ] = DB::table( "fudebiol_publicaciones" )->where( "fp_id", $id )->first();
            if ( $data[ "resultado" ] ){
                $data[ "resultado" ] = ( object )array_merge( ( array )$data[ "resultado" ],
                    array( "imagenes" => DB::table( "fudebiol_publicaciones_img AS p" )
                        ->join( "fudebiol_imagenes AS img", "p.fpi_imagen_id", "=", "img.fi_id" )
                        ->where( "p.fpi_publicacion_id", "=", $id )
                        ->orderBy( "img.fi_id" )
                        ->select( "img.fi_id AS FI_ID", "img.fi_formato AS FI_FORMATO" )
                        ->get()
                    ) );
            }
        }catch ( Exception $e ){
            $data[ "codigo" ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function obtenerPublicaciones( ){
        $data = array(
        "codigo" => Util::$codigos[ "EXITO" ],
        "razon" => "",
        "accion" => "PublicacionesModel:obtenerPublicaciones"
        );
        try{
        $data['resultado'] = DB::table('fudebiol_publicaciones')
                                ->join('fudebiol_publicaciones_img', 'fudebiol_publicaciones_img.fpi_publicacion_id', '=', 'fudebiol_publicaciones.fp_id')
                                ->join('fudebiol_imagenes', 'fudebiol_publicaciones_img.fpi_imagen_id', '=', 'fudebiol_imagenes.fi_id')
                                ->select('fudebiol_imagenes.*', 'fudebiol_publicaciones.*')
                                ->orderBy('fudebiol_publicaciones.fp_fecha')
                                ->get();
        }catch(Exception $e){
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function agregarPublicacion( $request ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "PublicacionesModel:agregarPublicacion"
        );
        try {
            DB::begintransaction();
            $imagenes_temporales = $request->input( "fp-imagenes-temporales", array() );
            DB::table( "fudebiol_imagenes_temp" )->whereIn( "fit_imagen_id", $imagenes_temporales )->delete();
            try{
                $publicacion_id = DB::table('fudebiol_publicaciones')->insertGetId([
                    'fp_titulo' => $request->input( 'fp_titulo' ),
                    'fp_descripcion' => $request->input( 'fp_descripcion' ),
                    'fp_fecha' => date( 'Y-m-d H:i:s' ),
                ]);
                foreach ( $imagenes_temporales as $imagen_id ){
                    DB::table( 'fudebiol_publicaciones_img' )->insert( [
                        'fpi_publicacion_id' => $publicacion_id,
                        'fpi_imagen_id' =>  $imagen_id,
                    ] );
                }
                try{
                    $imagenes_temporales_eliminadas_ids = $request->input( "fp-imagenes-temporales-eliminadas-ids", array() );
                    $imagenes_temporales_eliminadas_formatos = $request->input( "fp-imagenes-temporales-eliminadas-formatos", array() );
                    DB::table( "fudebiol_imagenes_temp" )->whereIn( "fit_imagen_id", $imagenes_temporales_eliminadas_ids )->delete();
                    DB::table( "fudebiol_imagenes" )->whereIn( "fi_id", $imagenes_temporales_eliminadas_ids )->delete();
                    for ( $i = 0; $i < count( $imagenes_temporales_eliminadas_ids ); ++$i ){
                        Storage::delete( "public/img/fudebiol_imagenes/" . $imagenes_temporales_eliminadas_ids[ $i ] . "." . $imagenes_temporales_eliminadas_formatos[ $i ] );
                    }
                    $data[ "resultado" ] = $publicacion_id;
                    DB::commit();
                }catch ( Exception $e ){
                    $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
                    $data['razon'] = "Ocurrió un error al eliminar las imágenes'";
                    Log::error( $e->getMessage(), $data );
                    DB::rollBack();
                }
            } catch (Exception $e){
                $data['codigo'] = Util::$codigos[ "ERROR_DE_INSERCION" ];
                $data['razon'] = "Ocurrió un error al guardar publicación";
                Log::error( $e->getMessage(), $data );
                DB::rollBack();
            }
        } catch (Exception $e) {
            $data['codigo'] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;  
    }

    public function editarPublicacion( $request ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "PublicacionesModel:editarPublicacion"
        );
        try {
            DB::begintransaction();
            $imagenes_temporales = $request->input( "fp-imagenes-temporales", array() );
            DB::table( "fudebiol_imagenes_temp" )->whereIn( "fit_imagen_id", $imagenes_temporales )->delete();
            try{
                DB::table('fudebiol_publicaciones')->where( "fp_id", "=", $request->input( "fp_id" ) )->update([
                    'fp_titulo' => $request->input( 'fp_titulo' ),
                    'fp_descripcion' => $request->input( 'fp_descripcion' )
                ]);
                foreach ( $imagenes_temporales as $imagen_id ){
                    DB::table( 'fudebiol_publicaciones_img' )->insert( [
                        'fpi_publicacion_id' => $request->input( "fp_id" ),
                        'fpi_imagen_id' =>  $imagen_id,
                    ] );
                }
                try{
                    $imagenes_eliminadas = $request->input( "fp-imagenes-eliminadas", array() );
                    $imagenes_eliminadas_ids = array_keys( $imagenes_eliminadas );
                    DB::table( "fudebiol_publicaciones_img" )->whereIn( "fpi_imagen_id", $imagenes_eliminadas_ids )->delete();
                    DB::table( "fudebiol_imagenes" )->whereIn( "fi_id", $imagenes_eliminadas_ids )->delete();
                    foreach ( $imagenes_eliminadas as $id => $formato ){
                        Storage::delete( "public/img/fudebiol_imagenes/" . $id . "." . $formato );
                    }
                    $imagenes_temporales_eliminadas = $request->input( "fp-imagenes-temporales-eliminadas", array() );
                    $imagenes_temporales_eliminadas_ids = array_keys( $imagenes_temporales_eliminadas );
                    DB::table( "fudebiol_imagenes_temp" )->whereIn( "fit_imagen_id", $imagenes_temporales_eliminadas_ids )->delete();
                    DB::table( "fudebiol_imagenes" )->whereIn( "fi_id", $imagenes_temporales_eliminadas_ids )->delete();
                    foreach ( $imagenes_temporales_eliminadas as $id => $formato ){
                        Log::warning( "public/img/fudebiol_imagenes/" . $id . "." . $formato );
                        Storage::delete( "public/img/fudebiol_imagenes/" . $id . "." . $formato );
                    }
                    $data[ "resultado" ] = $request->input( "fp_id" );
                    DB::commit();
                }catch ( Exception $e ){
                    $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
                    $data['razon'] = "Ocurrió un error al eliminar las imágenes'";
                    Log::error( $e->getMessage(), $data );
                    DB::rollBack();
                }
            } catch (Exception $e){
                $data['codigo'] = Util::$codigos[ "ERROR_DE_INSERCION" ];
                $data['razon'] = "Ocurrió un error al guardar publicación";
                Log::error( $e->getMessage(), $data );
                DB::rollBack();
            }
        } catch (Exception $e) {
            $data['codigo'] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;  
    }

    public function agregarImagenesTemporales( $request ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "resultado" => array(),
            "accion" => "PublicacionesModel:agregarImagenesTemporales"
        );
        try{
            $date = new \DateTime();
            $temp = DB::table( "fudebiol_imagenes_temp AS temp" )
                ->join( "fudebiol_imagenes AS img", "img.fi_id", "=", "temp.fit_imagen_id" )
                ->whereDate( "fit_fecha", "<", $date->sub( new \DateInterval( "PT1H" ) ) )
                ->select( "img.fi_id AS FI_ID", "img.fi_formato AS FI_FORMATO" )
                ->get();
            $temp_i = 0;
            DB::beginTransaction();
            foreach ( $request->file( "imagenes" ) as $imagen ){
                try{
                    if ( $temp_i >= COUNT( $temp ) ){
                        $imagen_id = DB::table( "fudebiol_imagenes" )->insertGetId( [
                            "fi_descripcion" => "",
                            "fi_formato" => $imagen->extension()
                        ] );
                        DB::table( "fudebiol_imagenes_temp" )->insert( [
                            "fit_imagen_id" => $imagen_id,
                            "fit_fecha" => $date->format( "Y-m-d H:i:s" )
                        ] );
                    }else{
                        $imagen_id = $temp[ $temp_i ]->FI_ID;
                        Storage::delete( "public/img/fudebiol_imagenes/" . $imagen_id . "." . $temp[ $temp_i++ ]->FI_FORMATO );
                        DB::table( "fudebiol_imagenes" )->where( "fi_id", "=", $imagen_id )->update( [
                            "fi_formato" => $imagen->extension()
                        ] );
                        DB::table( "fudebiol_imagenes_temp" )->where( "fit_imagen_id", "=", $imagen_id )->update( [
                            "fit_fecha" => $date->format( "Y-m-d H:i:s" )
                        ] );
                    }
                    try{
                        $imagen->storeAs( "public/img/fudebiol_imagenes/", $imagen_id . "." . $imagen->extension() );
                        $data[ "resultado" ][] = array(
                            "FI_ID" => $imagen_id,
                            "FI_FORMATO" => $imagen->extension()
                        );
                    }catch ( Exception $e ){
                        $data[ "codigo" ] = Util::$codigos[ "ERROR_SUBIENDO_ARHIVO" ];
                        $data[ "razon" ] = "Ocurrió un error al subir la imagen " . $imagen->getClientOriginalName();
                        Log::error( $e->getMessage(), $data );
                        DB::rollBack();
                        break;
                    }
                }catch ( Exception $e ){
                    $data[ "codigo" ] = Util::$codigos[ "ERROR_DE_INSERCION" ];
                    $data[ "razon" ] = "Error al guardar la imagen '" . $imagen->getClientOriginalName() . "' en la base de datos";
                    Log::error( $e->getMessage(), $data );
                    DB::rollBack();
                    break;
                }
            }
            if ( $data[ "codigo" ][ "codigo" ] == Util::$codigos[ "EXITO" ][ "codigo" ] ){
                DB::commit();
            }
        }catch ( Exception $e ){
            $data['codigo'] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }
   
    public function eliminar( $request ) {
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "PublicacionesModel:eliminarPublicacion"
        );
        try{
            DB::table('fudebiol_publicaciones')->whereIn('fp_id', $request->input('fp_id'))->delete();
            try{
                $imagenes = DB::table( "fudebiol_imagenes" )->wehereIn('fi_id', $request->input( "imagenes_eliminadas" ) )->get();
                if ( count( $imagenes ) > 0 ){
                    try {
                        DB::table( "fudebiol_imagenes" )->wehereIn( "fi_id", $request->input( "imagenes_eliminadas" ) )->delete();
                        DB::table( "fudebiol_publicaciones_img" )->wehereIn( "fpi_imagen_id", $request->input( "imagenes_eliminadas" ) )->delete();
                        try{
                            foreach ( $imagenes as $imagen ){
                                Storage::delete( "public/img/fudebiol_publicaciones/" . $imagen->FI_ID . $imagen->FI_FORMATO );
                            }
                            DB::commit();
                        }catch ( Exception $e ){
                            $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO_ARCHIVO" ];
                            $data['razon'] = "Ocurrió un error eliminando archivos";
                            Log::error( $e->getMessage(), $data );
                            DB::rollBack();
                        }
                    } catch (Exception $e){
                        $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
                        $data['razon'] = "Ocurrió un error al eliminar imagenes";
                        Log::error( $e->getMessage(), $data );
                        DB::rollBack();
                    }
                }  
            } catch (Exception $e){
                $data['codigo'] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
                $data['razon'] = "Ocurrió un error al obtener las imagenes";
                Log::error( $e->getMessage(), $data );
                DB::rollBack();
            }
        }catch(Exception $e){
            $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
            $data['razon'] = "Ocurrió un error al eliminar en fudebiol_publicaciones";
            Log::error( $e->getMessage(), $data );
            DB::rollBack();
        }
        return $data;
    }
}