<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
Use Exception;

class LotesModel extends Model {

    public function obtenerArboles(){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "editarUsuario"
        );
        try{
           $data["resultado"] = DB::table('fudebiol_lotes')->get();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
        }
        return $data;
    }

    public function eliminarLote($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "editarUsuario"
        );
        try{
            DB::table('fudebiol_lotes')->where('fl_id', $request->input('lote_id'))->delete();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_ELIMINANDO" ];
        }
        return $data;
    }

    public function crearLote($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "editarUsuario"
        );
        try {
            $data['resultado'] = DB::table('fudebiol_lotes')->insertGetId([
                'fl_nombre' => $request->input('nombre_lote'),
                'fl_tamano' => $request->input('tamano_lote'),
                'fl_filas' => $request->input('filas_lote'),
                'fl_columnas' => $request->input('columnas_lote')
            ]);
        } catch (Exception $e) {
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_INSERCION" ];
        }
        return $data;
    }

    public function editarLote($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "editarUsuario"
        );
        try{
            DB::table('fudebiol_lotes')->where('fl_id',$request->input('lote_id'))
            ->update([
                'fl_nombre' => $request->input('nombre_lote'),
                'fl_tamano' => $request->input('tamano_lote'),
                'fl_filas' => $request->input('filas_lote'),
                'fl_columnas' => $request->input('columnas_lote')
            ]);
        }catch(Exception $e){
           $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_INSERCION" ];
        }
        return $data;
    }
}