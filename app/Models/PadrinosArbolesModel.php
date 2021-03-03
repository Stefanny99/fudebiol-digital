<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

class PadrinosArbolesModel extends Model {

    public function obtenerPadrinosArbol($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerPadrinosArbol"
        );
        try{
           DB::table('fudebiol_padrinos_arboles')->where('fpa_arbol_lote_id', $request->input('fpa_arbol_lote_id'))->get();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function eliminarPadrinoArbol($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "eliminarPadrinoArbol"
        );
        try{
            DB::table('fudebiol_padrinos_arboles')->where('fpa_id', $request->input('fpa_id'))->delete();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_ELIMINANDO" ];
        }
        return $data;
    }

    public function crearPadrinoArbol($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "crearPadrinoArbol"
        );
        try {
            DB::table('fudebiol_padrinos_arboles')->insert([
                'fpa_padrino_id' => $request->input('fpa_padrino_id'),
                'fpa_arbol_lote_id' => $request->input('fpa_arbol_lote_id'),
                'fpa_fecha_adopcion' => date('Y-m-d H:i:s'),
                'fpa_estado' => $request->input('fpa_estado')
            ]);
        } catch (Exception $e) {
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_INSERCION" ];
        }
        return $data;
    }

    public function editarPadrinoArbol($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "editarPadrinoArbol"
        );
        try{
            DB::table('fudebiol_padrinos_arboles')->where('fpa_id',$request->input('lote_id'))
            ->update([
                'fpa_padrino_id' => $request->input('fpa_padrino_id'),
                'fpa_arbol_lote_id' => $request->input('fpa_arbol_lote_id'),
                'fpa_fecha_adopcion' => date('Y-m-d H:i:s'),
                'fpa_estado' => $request->input('fpa_estado')
            ]);
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_ACTUALIZACION" ];
        }
        return $data;
    }
}