<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

class NotificacionesModel extends Model {

    public function obtenerNotificaciones($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerNotificaciones"
        );
        try{
           DB::table('fudebiol_notificaciones')->orderBy('fn_id', 'desc')->get();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
        }
        return $data;
    }

    public function obtenerNotificacionesNoLeidas(){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerNotificacionesNoLeidas"
        );
        try{
           DB::table('fudebiol_notificaciones')->where('fn_estado', 1)->get();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];;
        }
        return $data;
    }

    public function eliminarNotificacion($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "eliminarNotificacion"
        );
        try{
            DB::table('fudebiol_notificaciones')->where('fn_id', $request->input('notificacion_id'))->delete();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_ELIMINANDO" ];
        }
        return $data;
    }

    public function marcarNotificacionComoLeida($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "marcarNotificacionComoLeida"
        );
        try{
            DB::table('fudebiol_notificaciones')->where('fn_id', $request->input('notificacion_id'))
            ->update(['fn_estado' => 0]);
            $data['resultado'] = "¡Registro actualizado con éxito! ";
            $data['exito'] = true;
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_ACTUALIZACION" ];
        }
        return $data;
    }

    public function crearNotificacion($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "crearNotificacion"
        );
        try {
            DB::table('fudebiol_notificaciones')->insert([
                'fn_fecha' => date('Y-m-d H:i:s'),
                'fn_desecripcion' => $request->input('fn_desecripcion'),
                'fn_tipo' => $request->input('fn_tipo'),
                'fn_estado' => 1
            ]);
        } catch (Exception $e) {
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_INSERCION" ];
        }
        return $data;
    }
}