<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
Use Exception;
use App\Helper\Util;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class LotesModel extends Model {
    public function obtenerLotes( $pagina, $nombre_lote ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "obtenerLotes"
        );
        try{
            $data["resultado"] = DB::table('fudebiol_lotes')
            ->where('fl_nombre', 'like', '%'.$nombre_lote.'%')
            ->skip( ( $pagina - 1 ) * 8 )->take( 8 )->get();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
        }
        return $data;
    }

    public function cantidadPaginas( $nombre_lote ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "LotesModel:cantidadPaginas"
        );
        try{
            $data[ "resultado" ] = ceil( DB::table( "fudebiol_lotes" )
            ->where('fl_nombre', 'like', '%'.$nombre_lote.'%')
            ->count() / 8 );
        }catch ( Exception $e ){
            $data[ "codigo" ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function eliminarLotes($request){
        $data = array(
            "errores" => array(),
            "accion" => "eliminarLotes",
        );
        try{
            foreach ($request->input('lotes_eliminar') as $idlote => $nombre_lote) {
                $arbol = DB::table('fudebiol_arboles_lote')->where('fal_lote_id', $idlote)->first();
                if ($arbol) {
                    array_push( $data[ 'errores'] , 'No se puede eliminar el lote ' . $nombre_lote . ' porque contiene árboles' );
                } else {
                    try {
                        DB::table('fudebiol_lotes')->where('fl_id', $idlote)->delete();
                    } catch (Exception $e){
                        array_push( $data[ 'errores' ], "Ocurrió un error eliminando el lote" . $nombre_lote);
                        Log::error( $e->getMessage(), $data );
                    }
                }
            }
        }catch(Exception $e){
            array_push( $data[ 'errores' ], "Ocurrió un error en el servidor eliminando lotes" );
            Log::error( $e->getMessage(), $data );
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