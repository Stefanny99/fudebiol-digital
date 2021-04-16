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
            "accion" => "PadrinosArbolesModel:obtenerPadrinosArbol"
        );
        try{
            $data['resultado'] = DB::table('fudebiol_padrinos_arboles')->where('fpa_arbol_lote_id', $request->input('fpa_arbol_lote_id'))->get();
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
            "accion" => "PadrinosArbolesModel:eliminarPadrinoArbol"
        );
        try {
            $padrino_arbol = DB::table( "fudebiol_padrinos_arboles" )->where( 'fpa_id', $request->input( "fpa_id" ) )->get();
            DB::begintransaction();
            try {
                DB::table('fudebiol_padrinos_arboles')->where('fpa_id', $request->input('fpa_id'))->delete();
                if ($padrino_arbol->FPA_IMAGEN_FORMATO){
                    try {
                        Storage::delete( "public/img/fudebiol_adopciones/" . $padrino_arbol->FPA_ID . $padrino_arbol->FPA_IMAGEN_FORMATO );
                        DB::commit(); 
                    } catch(Exception $e){
                        $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
                        $data['razon'] = "Ocurrió un error al eliminar el comprobante de la adopción";
                        DB::rollBack();
                    }  
                }else {
                    DB::commit();
                }  
            } catch (Exception $e) {
                $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
                $data['razon'] = "Ocurrió un error al eliminar la adopción";
                DB::rollBack();
            }    
        }catch(Exception $e){
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function crearPadrinoArbol($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "PadrinosArbolesModel:crearPadrinoArbol"
        );
        Log::error("request: ", $request );
        Log::error( "comprobante", $request->file( "comprobante" ) );
        try {
            Log::error( "comprobante", "hola" );
            DB::begintransaction();
            $padrino_arbol_id = DB::table('fudebiol_padrinos_arboles')->insertGetId([
                'fpa_padrino_id' => $request->input('fpa_padrino_id'),
                'fpa_arbol_lote_id' => $request->input('fpa_arbol_lote_id'),
                'fpa_fecha_adopcion' => date('Y-m-d H:i:s'),
                'fpa_estado' => $request->input('fpa_estado'),
                'fpa_comprobante_formato' => $request->hasFile( 'comprobante' ) ? $request->file( "comprobante" )->extension() : ''
            ]);
            if ( $request->hasFile( 'comprobante' ) ){
                try{
                    $request->file( 'comprobante' )->storeAs( "public/img/fudebiol_adopciones/", $padrino_arbol_id . '.' . $request->file( 'comprobante' )->extension() );
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
        } catch (Exception $e) {
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_INSERCION" ];
            $data['razon'] = "Ocurrió un error al realizar la adopción ";
            Log::error( $e->getMessage(), $data );
            DB::rollBack();
        }
        return $data;
    }

    public function editarPadrinoArbol($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "PadrinosArbolesModel:editarPadrinoArbol"
        );
        try{
            DB::table('fudebiol_padrinos_arboles')->where('fpa_id',$request->input('fpa_id'))
            ->update([
                'fpa_padrino_id' => $request->input('fpa_padrino_id'),
                'fpa_arbol_lote_id' => $request->input('fpa_arbol_lote_id'),
                'fpa_estado' => $request->input('fpa_estado')
            ]);
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_ACTUALIZACION" ];
        }
        return $data;
    }

    public function reporteSegunCantidadDeAdopciones() { //el de la interfaz verde
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "PadrinosArbolesModel:reporteSegunCantidadDeAdopciones"
        );
        try{
            $data['resultado'] = DB::table('fudebiol_padrinos_arboles')
            ->join('fudebiol_padrinos', 'fudebiol_padrinos_arboles.fa_padrino_id', '=', 'fudebiol_padrinos.fp_id')
            ->select('fp_nombre_completo', DB::raw('count(fpa_padrino_id) as cantidad'))           
            ->groupBy('fp_nombre_completo')
            ->take(3)->get();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function reporteAdopcionesSegunPadrino() { //el de la interfaz naranja
        // select count nombre_padrino, count(adopciones), count(especies), count(cada especie) group by where estado=aprobado
    }
}