<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

class ArbolesLoteModel extends Model {
    public function obtenerArbolesPorLote($request, $pagina){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerArbolesPorLote"
        );
        try{
            $data['resultado'] = DB::table('fudebiol_arboles_lote')
            ->join('fudebiol_arboles', 'fudebiol_arboles_lote.fal_arbol_id', '=', 'fudebiol_arboles.fa_id')
            ->select('fudebiol_arboles_lote.*','fudebiol_arboles.*','fudebiol_lotes.*')
            ->where('fudebiol_lotes.fl_nombre', '=', $request->input('fl_nombre'))
            ->where('fudebiol_arboles.fal_fila', 'like', '%'.$request->input('fal_fila').'%')
            ->where('fudebiol_arboles.fal_fila', 'like', '%'.$request->input('fal_columna').'%')
            ->skip( ( $pagina - 1 ) * 8 )->take( 8 )->get();
        }catch(Exception $e){
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function obtenerLotes(){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerLotes"
        );
        try{
            $data[ "resultado" ] = array();
            $lotes = DB::table( "fudebiol_lotes" )->orderBy( "fl_nombre", "ASC" )->get();
            foreach ( $lotes as $lote ){
                $data[ "resultado" ][ $lote->FL_ID ] = ( object )array_merge( ( array )$lote, array(
                    "arboles" => DB::table( "fudebiol_arboles_lote AS al" )
                        ->join( "fudebiol_arboles AS a", "a.fa_id", "=", "al.fal_arbol_id" )
                        ->leftJoin( "fudebiol_padrinos_arboles AS p", "p.fpa_arbol_lote_id", "=", "al.fal_id" )
                        ->where( "al.fal_lote_id", "=", $lote->FL_ID )
                        ->select( "al.fal_id AS FAL_ID", "al.FAL_FILA AS FAL_FILA", "al.FAL_COLUMNA AS FAL_COLUMNA", DB::raw( "SUM( p.fpa_id ) AS adopciones" ) )
                        ->groupBy( "al.fal_id", "al.fal_fila", "al.fal_columna" )
                        ->get()
                    )
                );
            }
        }catch ( Exception $e ){
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