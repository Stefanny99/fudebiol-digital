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
            "accion" => "PadrinosArbolesModel:eliminarPadrinoArbol"
        );
        try {
            $imagen = DB::table( "fudebiol_imagenes" )->where( 'fi_id', $request->input( "fi_id" ) )->get();
            DB::begintransaction();
            try {
                DB::table('fudebiol_padrinos_arboles')->where('fpa_id', $request->input('fpa'))->delete();
                try {
                    Storage::delete( "public/img/fudebiol_adopciones/" . $imagen->FA_ID . $imagen->FA_IMAGEN_FORMATO );
                    DB::commit(); 
                } catch(Exception $e){
                    $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
                    $data['razon'] = "Ocurrió un error al eliminar la imagen del árbol";
                    DB::rollBack();
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
            "accion" => "PadrinosArbolesModel:crearPadrinoArbol"
        );
        try {
            DB::begintransaction();
            $padrino_arbol_id = DB::table('fudebiol_padrinos_arboles')->insertGetId([
                'fpa_padrino_id' => $request->input('fpa_padrino_id'),
                'fpa_arbol_lote_id' => $request->input('fpa_arbol_lote_id'),
                'fpa_fecha_adopcion' => date('Y-m-d H:i:s'),
                'fpa_estado' => $request->input('fpa_estado'),
                'fpa_imagen_formato' => $request->hasFile( 'fpa_imagen' ) ? $request->file( "fpa_imagen" )->extension() : ''
            ]);
            if ( $request->hasFile( 'fpa_imagen' ) ){
                try{
                    $request->file( 'fpa_imagen' )->storeAs( "public/img/fudebiol_adopciones/", $padrino_arbol_id . '.' . $request->file( 'fpa_imagen' )->extension() );
                    DB::commit();
                }catch ( Exception $e ){
                    $data[ "codigo" ] = Util::$codigos[ "ERROR_SUBIENDO_ARHIVO" ];
                    $data[ "razon" ] = "Ocurrió un error al subir la imagen " . $imagen->getClientOriginalName();
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
}