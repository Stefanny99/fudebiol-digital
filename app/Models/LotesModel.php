<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
Use Exception;
use App\Helper\Util;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class LotesModel extends Model {
    public function obtenerLotes($nombre_lote){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerLotes"
        );
        try{
            $data["resultado"] = DB::table('fudebiol_lotes')
            ->where('fl_nombre', 'like', '%'.$nombre_lote.'%')
            ->get();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
        }
        return $data;
    }

    public function eliminarLotes($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "eliminarLotes"
        );
        try{
            DB::table('fudebiol_lotes')->whereIn('fl_id', $request->input('ids'))->delete();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_ELIMINANDO" ];
        }
        return $data;
    }

    public function crearLote($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "crearLote"
        );
        try {
            $data['resultado'] = DB::table('fudebiol_lotes')->insertGetId([
                'fl_nombre' => $request->input('fl_nombre'),
                'fl_tamano' => $request->input('fl_tamano'),
                'fl_filas' => $request->input('fl_filas'),
                'fl_columnas' => $request->input('fl_columnas')
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
            "accion" => "editarLote"
        );
        try{
            DB::table('fudebiol_lotes')->where('fl_id',$request->input('fl_id'))
            ->update([
                'fl_nombre' => $request->input('fl_nombre'),
                'fl_tamano' => $request->input('fl_tamano'),
                'fl_filas' => $request->input('fl_filas'),
                'fl_columnas' => $request->input('fl_columnas')
            ]);
        }catch(Exception $e){
           $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_ACUALIZACION" ];
        }
        return $data;
    }
}