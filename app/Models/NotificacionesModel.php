<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

class NotificacionesModel extends Model {

    public function obtenerNotificaciones(){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "NotificacionesModel:obtenerNotificaciones"
        );
        try{
            $data["resultado"] = DB::table('fudebiol_notificaciones')
            ->orderBy('fn_estado', 'desc')
            ->orderBy('fn_fecha', 'asc')
            ->get();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
        }
        return $data;
    }

    public function eliminarNotificaciones($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "NotificacionesModel:eliminarNotificaciones"
        );
        try{
            DB::table('fudebiol_notificaciones')->whereIn('fn_id', $request->input('ids'))->delete();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_ELIMINANDO" ];
        }
        return $data;
    }

    public function marcarNotificacionesComoLeidas($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "NotificacionesModel:marcarNotificacionesComoLeidas"
        );
        try{
            DB::table('fudebiol_notificaciones')->whereIn('fn_id', $request->input('ids'))
            ->update(['fn_estado' => 0]);
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_ACTUALIZACION" ];
        }
        return $data;
    }

    public function crearNotificacion($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "NotificacionesModel:crearNotificacion"
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