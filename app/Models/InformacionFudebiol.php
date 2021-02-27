<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
Use Exception;

use App\Helper\Util;

use Illuminate\Database\Eloquent\Model;

class InformacionFudebiolModel extends Model {

  public function obtenerInformacionFudebiol(){
    $data = array(
      "codigo" => Util::$codigos[ "EXITO" ],
      "razon" => "",
      "accion" => "obtenerInformacionFudebiol"
    );
    try{
      $data['resultado'] = DB::table('fudebiol_informacion_general')->get();
    }catch(Exception $e){
      $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
    }
    return $data;
  }

  public function obtenerContactos(){
    $data = array(
      "codigo" => Util::$codigos[ "EXITO" ],
      "razon" => "",
      "accion" => "obtenerContactos"
    );
    try{
      $data['resultado'] = DB::table('fudebiol_contactos')->get();
    }catch(Exception $e){
      $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
    }
    return $data;
  }

  public function obtenerObjetivos(){
    $data = array(
      "codigo" => Util::$codigos[ "EXITO" ],
      "razon" => "",
      "accion" => "obtenerObjetivos"
    );
    try{
      $data['resultado'] = DB::table('fudebiol_objetivos')->get();
    }catch(Exception $e){
      $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
      Log::error( $e->getMessage(), $data );
    }
    return $data;
  }

  public function obtenerActividades(){
    $data = array(
      "codigo" => Util::$codigos[ "EXITO" ],
      "razon" => "",
      "accion" => "obtenerActividades"
    );
    try{
      $data['resultado'] = DB::table('fudebiol_servicios_actividades')
      ->join('fudebiol_actividades_imagenes', 'fudebiol_actividades_imagenes.fai_servicios_actividades_id', '=', 'fudebiol_servicios_actividades.fsa_id')
      ->join('fudebiol_imagenes', 'fudebiol_actividades_imagenes.fai_imagen_id', '=', 'fudebiol_imagenes.fi_id')
      ->select('fudebiol_servicios_actividades.*', 'fudebiol_imagenes.*')
      ->get();
    }catch(Exception $e){
      $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
      Log::error( $e->getMessage(), $data );
    }
    return $data;
  }
}