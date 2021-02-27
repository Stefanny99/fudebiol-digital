<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

class PadrinosModel extends Model {

    public function obtenerPadrinos(){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerPadrinos"
        );
        try{
            $data['resultado'] = DB::table('fudebiol_padrinos')->get();
        }catch(Exception $e){
            $data['codigo'] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function obtenerPadrinoPorCedula($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerPadrinoPorCedula"
        );
        try{
            $data['resultado'] = DB::table('fudebiol_padrinos')->where('fp_cedula', $request->input('fp_cedula'))->first();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function eliminarPadrino($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "eliminarPadrino"
        );
        try{
            DB::table('fudebiol_padrinos')->where('fp_id', $request->input('fp_id'))->delete();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_ELIMINANDO" ];
        }
        return $data;
    }

    public function crearPadrino($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "crearPadrino"
        );
        try {
            $data['resultado'] =  DB::table('fudebiol_padrinos')->insertGetId([
                'fp_cedula' => $request->input('fp_cedula'),
                'fp_nombre1' => $request->input('fp_nombre1'),
                'fp_nombre2' => $request->input('fp_nombre2'),
                'fp_apellido1' => $request->input('fp_apellido1'),
                'fp_apellido2' => $request->input('fp_apellido2'),
                'fp_tipo' => $request->input('fp_tipo')
            ]);
        } catch (Exception $e) {
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_INSERCION" ];
        }
        return $data;
    }

    public function editarPadrino($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "editarPadrino"
        );
        try{
            DB::table('fudebiol_padrinos')->where('fp_id',$request->input('padrino_id'))
            ->update([
                'fp_cedula' => $request->input('fp_cedula'),
                'fp_nombre1' => $request->input('fp_nombre1'),
                'fp_nombre2' => $request->input('fp_nombre2'),
                'fp_apellido1' => $request->input('fp_apellido1'),
                'fp_apellido2' => $request->input('fp_apellido2'),
                'fp_tipo' => $request->input('fp_tipo')
            ]);
        }catch(Exception $e){
            $data['codigo'] = Util::$codigos[ "ERROR_DE_ACTUALIZACION" ];
        }
        return $data;
    }
}