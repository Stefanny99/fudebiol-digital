<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

// fp_titulo descriocion y decha

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
    
}