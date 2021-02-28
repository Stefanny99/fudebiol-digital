<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

class LotesModel extends Model {

    public function obtenerArbolesPorLote($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerArbolesPorLote"
        );
        try{
            $data['resultado'] = DB::table('fudebiol_arboles_lote')->where('fal_lote_id', $request->input('fal_lote_id'))->get();
        }catch(Exception $e){
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function eliminarArbolLote($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "eliminarArbolLote"
        );
        try{
            DB::table('fudebiol_arboles_lote')->where('fal_id', $request->input('fal_id'))->delete();
        }catch(Exception $e){
            $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function crearArbolLote($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "crearArbolLote"
        );
        try {
            DB::table('fudebiol_arboles_lote')->insert([
                'fal_arbol_id' => $request->input('fal_arbol_id'),
                'fal_lote_id' => $request->input('fal_lote_id'),
                'fal_coordenada_W' => $request->input('fal_coordenada_W'),
                'fal_coordenada_N' => $request->input('fal_coordenada_N'),
                'fal_fila' => $request->input('fal_fila'),
                'fal_columna' => $request->input('fal_columna')
            ]);
        } catch (Exception $e) {
            $data['codigo'] = Util::$codigos[ "ERROR_DE_INSERCION" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function editarArbolLote($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "editarArbolLote"
        );
        try{
            DB::table('fudebiol_arboles_lote')->where('fal_id',$request->input('fal_id'))
            ->update([
                'fal_arbol_id' => $request->input('fal_arbol_id'),
                'fal_lote_id' => $request->input('fal_lote_id'),
                'fal_coordenada_W' => $request->input('fal_coordenada_W'),
                'fal_coordenada_N' => $request->input('fal_coordenada_N'),
                'fal_fila' => $request->input('fal_fila'),
                'fal_columna' => $request->input('fal_columna')
            ]);
        }catch(Exception $e){
            $data['codigo'] = Util::$codigos[ "ERROR_DE_ACTUALIZACION" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }
}