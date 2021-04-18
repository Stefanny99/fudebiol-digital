<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Helper\Util;
Use Exception;
use Session;

class ArbolesLoteModel extends Model {
    private $tiempo_token = 5; // 5 min

    public function obtenerArbolesPorLote($request, $pagina){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "ArbolesLoteModel:obtenerArbolesPorLote"
        );
        try{
            $query = DB::table('fudebiol_arboles_lote')
            ->join('fudebiol_arboles', 'fudebiol_arboles_lote.fal_arbol_id', '=', 'fudebiol_arboles.fa_id')
            ->join('fudebiol_lotes', 'fudebiol_arboles_lote.fal_lote_id', '=', 'fudebiol_lotes.fl_id')
            ->select('fudebiol_arboles_lote.*', 'fudebiol_arboles.FA_NOMBRES_COMUNES', 'fudebiol_arboles.FA_ID', 'fudebiol_lotes.FL_NOMBRE', 'fudebiol_lotes.FL_ID')
            ->orderBy('fal_fila', 'asc');
            if ( $request->input( "lote_id") ) {
                $query->where('fal_lote_id', $request->input( "lote_id"));
            }
            if ( $request->input( "fila") ) {
                $query->where('fal_fila', $request->input( "fila"));
            }
            if ( $request->input( "columna" ) ) {
                $query->where('fal_columna', $request->input( "columna"));
            }
            $data['resultado'] = $query->skip( ( $pagina - 1 ) * 8 )->take( 8 )->get();
            $data['lotes'] = DB::table('fudebiol_lotes')->select('FL_ID', 'FL_NOMBRE')->get();
            $data['especies'] = DB::table('fudebiol_arboles')->select('FA_ID', 'FA_NOMBRES_COMUNES')->orderBy('FA_NOMBRES_COMUNES')->get();
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
            "accion" => "ArbolesLoteModel:obtenerLotes"
        );
        try{
            $data[ "resultado" ] = array();
            DB::table( "fudebiol_arboles_ocupados" )->where( "fao_fecha", "<", Carbon::now()->subMinutes( $this->tiempo_token )->toDateTimeString() )->delete();
            $lotes = DB::table( "fudebiol_lotes" )->orderBy( "fl_nombre", "ASC" )->get();
            foreach ( $lotes as $lote ){
                $data[ "resultado" ][ $lote->FL_ID ] = ( object )array_merge( ( array )$lote, array(
                    "arboles" => DB::table( "fudebiol_arboles_lote AS al" )
                        ->join( "fudebiol_arboles AS a", "a.fa_id", "=", "al.fal_arbol_id" )
                        ->leftJoin( "fudebiol_padrinos_arboles AS p", "p.fpa_arbol_lote_id", "=", "al.fal_id" )
                        ->leftjoin( "fudebiol_padrinos as fp", "fp.fp_id", "=", "p.fpa_padrino_id" )
                        ->leftJoinSub( DB::table( "fudebiol_arboles_ocupados" )
                            ->where( "fao_fecha", ">=", Carbon::now()->subMinutes( $this->tiempo_token )->toDateTimeString() ),
                            "ao", "ao.fao_arbol_id", "=", "al.fal_id" )
                        ->where( "al.fal_lote_id", "=", $lote->FL_ID )
                        ->select( "ao.fao_id AS FAO_ID", "a.fa_id AS FA_ID", "a.fa_nombre_cientifico AS FA_NOMBRE_CIENTIFICO", "a.fa_imagen_formato AS FA_IMAGEN_FORMATO", "al.fal_id AS FAL_ID", "al.fal_coordenada_n AS FAL_COORDENADA_N", "al.fal_coordenada_w AS FAL_COORDENADA_W", "al.fal_fila AS FAL_FILA", "al.fal_columna AS FAL_COLUMNA", DB::raw( "COUNT( p.fpa_id ) AS adopciones" ), "fp.FP_NOMBRE_COMPLETO" )
                        ->groupBy( "ao.fao_id", "a.fa_id", "a.fa_nombre_cientifico", "a.fa_imagen_formato", "al.fal_id", "al.fal_coordenada_n", "al.fal_coordenada_w", "al.fal_fila", "al.fal_columna", "fp.FP_NOMBRE_COMPLETO" )
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

    public function obtenerArbol( $request ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "ArbolesLoteModel:obtenerArbol"
        );
        try{
            DB::table( "fudebiol_arboles_ocupados" )->where( "fao_fecha", "<", Carbon::now()->subMinutes( $this->tiempo_token )->toDateTimeString() )->delete();
            DB::beginTransaction();
            $token_id = Session::get( "token_id", 0 );
            if ( !$token_id || $token_id <= 0 ){
                $token_id = DB::table( "fudebiol_arboles_ocupados" )->insertGetId( [
                    "fao_arbol_id" => $request->input( "fal_id" ),
                    "fao_fecha" => Carbon::now()->toDateTimeString()
                ] );
            }else if ( DB::table( "fudebiol_arboles_ocupados" )->where( "fao_id", "=", $token_id )->update( [ "fao_fecha" => Carbon::now()->toDateTimeString() ] ) <= 0 ){
                $token_id = 0;
            }
            if ( $token_id > 0 ){
                $data[ "resultado" ] = ( object )array_merge( ( array )DB::table( "fudebiol_arboles_lote AS al" )
                    ->join( "fudebiol_lotes AS l", "l.fl_id", "=", "al.fal_lote_id" )
                    ->join( "fudebiol_arboles AS a", "a.fa_id", "=", "al.fal_arbol_id" )
                    ->where( "al.FAL_ID", "=", $request->input( "fal_id" ) )
                    ->select( "l.fl_id AS FL_ID", "l.fl_nombre AS FL_NOMBRE", "a.fa_id AS FA_ID", "a.fa_nombre_cientifico AS FA_NOMBRE_CIENTIFICO", "a.fa_imagen_formato AS FA_IMAGEN_FORMATO", "al.fal_id AS FAL_ID", "al.fal_coordenada_n AS FAL_COORDENADA_N", "al.fal_coordenada_w AS FAL_COORDENADA_W", "al.fal_fila AS FAL_FILA", "al.fal_columna AS FAL_COLUMNA" )
                    ->first(), array(
                        "token_id" => $token_id
                    )
                );
                DB::commit();
            }else{
                $data[ "codigo" ] = Util::$codigos[ "NO_ENCONTRADO" ];
                $data[ "razon" ] = "token inválido";
                DB::rollBack();
            }
        }catch ( Exception $e ){
            $data[ "codigo" ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
            DB::rollBack();
        }
        return $data;
    }

    public function actualizarToken( $token ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "ArbolesLoteModel:actualizarToken"
        );
        try{
            DB::table( "fudebiol_arboles_ocupados" )->where( "fao_fecha", "<", Carbon::now()->subMinutes( $this->tiempo_token )->toDateTimeString() )->delete();
            DB::table( "fudebiol_arboles_ocupados" )->where( "fao_id", "=", $token )->update( [
                "fao_fecha" => Carbon::now()->toDateTimeString()
            ] );
        }catch ( Exception $e ){
            $data[ "codigo" ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function finalizarAdopcion( $request ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "ArbolesLoteModel:finalizarAdopcion"
        );
        try{
            DB::table( "fudebiol_arboles_ocupados" )->where( "fao_fecha", "<", Carbon::now()->subMinutes( $this->tiempo_token )->toDateTimeString() )->delete();
            DB::beginTransaction();
            if ( DB::table( "fudebiol_arboles_ocupados" )->where( "fao_id", "=", $request->input( "fao_id" ) )->delete() > 0 ){
                $padrino_arbol_id = DB::table( "fudebiol_padrinos_arboles" )->insertGetId( [
                    "fpa_padrino_id" => $request->input( "fp_id" ),
                    "fpa_arbol_lote_id" => $request->input( "fal_id" ),
                    "fpa_fecha_adopcion" => Carbon::now()->toDateTimeString(),
                    "fpa_estado" => "P",
                    'fpa_comprobante_formato' => $request->hasFile( 'comprobante' ) ? $request->file( "comprobante" )->extension() : ''
                ] );
                if ( $request->hasFile( 'comprobante' ) ){
                    try{
                        $request->file( 'comprobante' )->storeAs( "public/comprobantes/", $padrino_arbol_id . '.' . $request->file( 'comprobante' )->extension() );
                        DB::commit();
                    }catch ( Exception $e ){
                        $data[ "codigo" ] = Util::$codigos[ "ERROR_SUBIENDO_ARHIVO" ];
                        $data[ "razon" ] = "Ocurrió un error al subir el comprobante " . $request->file( 'comprobante' )->getClientOriginalName();
                        Log::error( $e->getMessage(), $data );
                        DB::rollBack();
                    }
                } else {
                    DB::commit();
                } 
            }else{
                $data[ "codigo" ] = Util::$codigos[ "NO_ENCONTRADO" ];
                $data[ "razon" ] = "token inválido";
                DB::rollBack();
            }
        }catch ( Exception $e ){
            $data[ "codigo" ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function cantidadPaginas( $lote, $fila, $columna ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "ArbolesLoteModel:cantidadPaginas"
        );
        try{
            $query =  DB::table( "fudebiol_arboles_lote" );
            if( $lote ){
                $query->where('fal_lote_id', $lote);
            }
            if( $fila ){
                $query->where('fal_fila', $fila);
            }
            if( $columna ){
                $query->where('fal_columna', $columna);
            }
            $data[ "resultado" ] = ceil( $query->count() / 8 );
        }catch ( Exception $e ){
            $data[ "codigo" ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function eliminarArbolesLote($request){
        $data = array(
            "errores" => array(),
            "accion" => "ArbolesLoteModel:eliminarArbolesLote"
        );
        try{
            foreach ($request->input('arboles-eliminados') as $arbolLoteId => $nombre){
                $adoptado = DB::table('fudebiol_padrinos_arboles')->where('fpa_arbol_lote_id', $arbolLoteId )->first();
                if( $adoptado ) {
                    array_push( $data[ 'errores' ], "No se pudo eliminar el árbol " . $nombre ." porque se encuentra adoptado " );
                }else {
                    try {
                        DB::table('fudebiol_arboles_lote')->where('fal_id', $arbolLoteId)->delete();
                    } catch (Exception $e){
                        array_push( $data[ 'errores' ], "Ocurrió un error eliminando el árbol " . $nombre );
                        Log::error( $e->getMessage(), $data );
                    }
                }
            }
        }catch(Exception $e){
            array_push( $data[ 'errores' ], "Ocurrió un error en el servidor eliminando árboles" );
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function crearArbolLote($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "ArbolesLoteModel:crearArbolLote"
        );
        try {
            $lote = DB::table('fudebiol_lotes')->where('fl_id', $request->input('fal_lote_id'))->first();
            if ($request->input('fal_fila') < 0 ||  $request->input('fal_columna') < 0 || $request->input('fal_fila') > ($lote->FL_FILAS - 1) || $request->input('fal_columna') > ($lote->FL_COLUMNAS - 1)){
                $data['codigo'] = Util::$codigos[ "ERROR_DE_INSERCION" ];
                $data['razon'] = "No se puede insertar en la fila y columna indicadas porque exeden los límites del lote";
            } else {
                $espacio_ocupado = DB::table('fudebiol_arboles_lote')
                                ->where('fal_fila', $request->input('fal_fila'))
                                ->where('fal_columna', $request->input('fal_columna'))
                                ->where('fal_lote_id', $request->input('fal_lote_id'))->first();
                if ( $espacio_ocupado ) {
                    $data['codigo'] = Util::$codigos[ "ERROR_DE_INSERCION" ];
                    $data['razon'] = "No se puede insertar en la fila y columna indicadas porque ya están ocupadas";
                } else {
                    DB::table('fudebiol_arboles_lote')->insert([
                        'fal_arbol_id' => $request->input('fal_arbol_id'),
                        'fal_lote_id' => $request->input('fal_lote_id'),
                        'fal_coordenada_W' => $request->input('fal_coordenada_W'),
                        'fal_coordenada_N' => $request->input('fal_coordenada_N'),
                        'fal_fila' => $request->input('fal_fila'),
                        'fal_columna' => $request->input('fal_columna')
                    ]);
                }
            }    
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
            "accion" => "ArbolesLoteModel:editarArbolLote"
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