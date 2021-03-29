<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

class MensajesModel extends Model {

    public function obtenerMensajes($pagina){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "MensajesModel:obtenerMensajes"
        );
        try{
            $data["resultado"] = DB::table('fudebiol_mensajes')
            ->orderBy('fm_estado', 'desc')
            ->orderBy('fm_id', 'desc')
            ->skip( ( $pagina - 1 ) * 8 )->take( 8 )->get();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
        }
        return $data;
    }

    public function cantidadPaginas( ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "MensajesModel:cantidadPaginas"
        );
        try{
            $data[ "resultado" ] = ceil( DB::table( "fudebiol_mensajes" )
            ->count() / 8 );
        }catch ( Exception $e ){
            $data[ "codigo" ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function eliminarMensajes($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "MensajesModel:eliminarMensajes"
        );
        try{
            DB::table('fudebiol_mensajes')->whereIn('fm_id', $request->input('ids'))->delete();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_ELIMINANDO" ];
        }
        return $data;
    }

    public function marcarMensajeComoLeidos($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "MensajesModel:marcarMensajeComoLeidos"
        );
        try{
            DB::table('fudebiol_mensajes')->whereIn('fm_id', $request->input('ids'))
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
            "accion" => "MensajesModel:crearMensaje"
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