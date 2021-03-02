<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

class PublicacionesModel extends Model {

  public function obtenerPublicaciones( ){
    $data = array(
      "codigo" => Util::$codigos[ "EXITO" ],
      "razon" => "",
      "accion" => "obtenerPublicaciones"
    );
    try{
      $data['resultado'] = DB::table('fudebiol_publicaciones')
                              ->join('fudebiol_publicaciones_img', 'fudebiol_publicaciones_img.fpi_publicacion_id', '=', 'fudebiol_publicaciones.fp_id')
                              ->join('fudebiol_imagenes', 'fudebiol_publicaciones_img.fpi_imagen_id', '=', 'fudebiol_imagenes.fi_id')
                              ->select('fudebiol_imagenes.*', 'fudebiol_publicaciones.*')
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
      "accion" => "agregarPublicacion"
    );
    try {
      DB::begintransaction();
      try{
        $publicacion_id = DB::table('fudebiol_publicaciones')->insertGetId([
          'fp_titulo' => '',
          'fp_descripcion' => $request->input( 'fp_descripcion' ),
          'fp_fecha' => date('d/m/Y'),
        ]);
        if ( $request->hasFile( 'imagenes' ) ){
          foreach ( $request->file( "imagenes" ) as $imagen ){
            try{
              $imagen_id = DB::table('fudebiol_imagenes')->insertGetId([
                'fi_descripcion' => '',
                'fi_formato' => $request->file( 'imagen' )->extension(),
              ]);
              try{
                $imagen_id = DB::table('fudebiol_publicaciones_img')->insertGetId([
                  'fpi_publicacion_id' => $publicacion_id,
                  'fpi_imagen_id' =>  $imagen_id,
                ]);
                try{
                  $request->file( 'imagen' )->storeAs( "public/img/fudebiol_publicaciones/", $imagen_id . '.' . $request->file( 'imagen' )->extension() );
                  DB::commit();
                } catch ( Exception $e ){
                  $data[ "codigo" ] = Util::$codigos[ "ERROR_SUBIENDO_ARHIVO" ];
                  $data[ "razon" ] = "Ocurrió un error al un error al subir imagen" . $imagen->getClientOriginalName();
                  Log::error( $e->getMessage(), $data );
                  DB::rollBack();
                }
              } catch (Exception $e){
                $data['codigo'] = Util::$codigos[ "ERROR_DE_INSERCION" ];
                $data['razon'] = "Ocurrió un error al guardar la imagen de la publicación";
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
   
  public function eliminar( $request ) {
    $data = array(
      "codigo" => Util::$codigos[ "EXITO" ],
      "razon" => "",
      "accion" => "eliminarPublicacion"
    );
    try{
      DB::table('fudebiol_publicaciones')->whereIn('fp_id', $request->input('fp_id'))->delete();
      try{
        $imagenes = DB::table( "fudebiol_imagenes" )->wehereIn('fi_id', $request->input( "imagenes_eliminadas" ) )->get();
        if ( count( $imagenes ) > 0 ){
          try {
            DB::table( "fudebiol_imagenes" )->wehereIn( "fi_id", $request->input( "imagenes_eliminadas" ) )->delete();
            try{
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
              $data['razon'] = "Ocurrió un error al eliminar en fudebiol_publicaciones_img";
              Log::error( $e->getMessage(), $data );
              DB::rollBack();
            }
          } catch (Exception $e){
            $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
            $data['razon'] = "Ocurrió un error al eliminar en fudebiol_imagenes";
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