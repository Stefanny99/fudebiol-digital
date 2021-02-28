<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

class MensajesModel extends Model {

    public function obtenerMensajes($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerMensajes"
        );
        try{
           DB::table('fudebiol_mensajes')->get();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
        }
        return $data;
    }

    public function obtenerMensajesNoLeidos(){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerMensajesNoLeidos"
        );
        try{
           DB::table('fudebiol_mensajes')->where('fm_estado', 1)->get();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_INSERCION" ];
        }
        return $data;
    }

    public function eliminarMensaje($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "eliminarMensaje"
        );
        try{
            DB::table('fudebiol_mensajes')->where('fm_id', $request->input('fm_id'))->delete();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_ELIMINANDO" ];
        }
        return $data;
    }

    public function marcarMensajeComoLeido($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "marcarMensajeComoLeido"
        );
        try{
            DB::table('fudebiol_mensajes')->where('fm_id', $request->input('fm_id'))
            ->update(['fm_estado' => 0]);
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_ACUALIZACION" ];
        }
        return $data;
    }

    public function crearMensaje($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "crearMensaje"
        );
        try {
            DB::table('fudebiol_mensajes')->insert([
                'fm_correo' => $request->input('fm_correo'),
                'fm_telefono' => $request->input('fm_telefono'),
                'fm_texto' => $request->input('fm_texto'),
                'fm_estado' => 1
            ]);
        } catch (Exception $e) {
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_INSERCION" ];
        }
        return $data;
    }
}