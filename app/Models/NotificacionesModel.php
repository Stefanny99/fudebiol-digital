<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Helper\Util;
Use Exception;

class NotificacionesModel extends Model {

    public function obtenerNotificaciones(){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "NotificacionesModel:obtenerNotificaciones"
        );
        try{
            $data[ "resultado" ] = DB::table( "fudebiol_padrinos_arboles AS fpa" )
                    ->join( "fudebiol_padrinos AS fp", "fp.fp_id", "=", "fpa.fpa_padrino_id" )
                    ->join( "fudebiol_arboles_lote AS fal", "fal.fal_id", "=", "fpa.fpa_arbol_lote_id" )
                    ->join( "fudebiol_arboles AS fa", "fa.fa_id", "=", "fal.fal_arbol_id" )
                    ->join( "fudebiol_lotes AS fl", "fl.fl_id", "=", "fal.fal_lote_id" )
                    ->where( "fpa.fpa_estado", "=", "P" )
                    ->orderBy( "fpa_id", "desc")
                    ->select(
                        "fpa.fpa_id", "fpa.fpa_fecha_adopcion", "fpa.fpa_comprobante_formato", "fp.fp_cedula", "fp.fp_nombre_completo",
                        "fp.fp_correo", "fl.fl_nombre", "fa.fa_nombres_comunes", "fal.fal_fila", "fal.fal_columna",
                    )
                    ->get();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function aceptarAdopcion($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "NotificacionesModel:aceptarAdopcion"
        );
        try{
            DB::beginTransaction();
            $resultado = DB::table('fudebiol_padrinos_arboles')->where( 'fpa_id', $request->input('fpa_id'))
                        ->update([
                            'fpa_estado' => 'A',
                        ]);
            try {
                $details = [
                    'nombre' => $request->input('padrino'),
                    'especie' => $request->input('especie'),
                    'lote' => $request->input('lote'),
                    'fila' => $request->input('fila'),
                    'columna' => $request->input('columna'),
                    'estado' => '1',
                    'certificado' => route('generarCertificado', $request->input('fpa_id'))
                ];
                \Mail::to($request->input('email'))->send(new \App\Mail\FudebiolMail($details));
                try {
                    Storage::delete( "public/comprobantes/" . $request->input('fpa_id') . "." . $request->input('fpa_comprobante_formato') );
                    DB::commit();
                } catch (Exception $e){
                    $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO_ARCHIVO" ];
                    $data['razon'] = "Ocurrió un error al eliminar comprobante de adopción";
                    Log::error( $e->getMessage(), $data );
                    DB::rollBack();
                }
            } catch (Exception $e) {
                $data['codigo'] = Util::$codigos[ "ERROR_ENVIANDO_EMAIL" ];
                $data['razon'] = "Ocurrió un error al enviar comprobante de adopción";
                Log::error( $e->getMessage(), $data );
                DB::rollBack();
            }
            if ($resultado <= 0) {
                $data[ 'codigo' ] =  Util::$codigos[ "NO_ENCONTRADO" ];
            }
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_ACTUALIZACION" ];
            $data['razon'] = "Ocurrió un error al aceptar la adopción";
            Log::error( $e->getMessage(), $data );
            DB::rollBack();
        }
        return $data;
    }

    public function rechazarAdopcion($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "NotificacionesModel:rechazarAdopcion"
        );
        try{
            DB::beginTransaction();
            $resultado = DB::table('fudebiol_padrinos_arboles')->where('fpa_id', $request->input('fpa_id'))->delete();
            try {
                $details = [
                    'nombre' => $request->input('padrino'),
                    'especie' => $request->input('especie'),
                    'lote' => $request->input('lote'),
                    'fila' => $request->input('fila'),
                    'columna' => $request->input('columna'),
                    'estado' => '0'
                ];
                \Mail::to($request->input('email'))->send(new \App\Mail\FudebiolMail($details));
                try {
                    Storage::delete( "public/comprobantes/" . $request->input('fpa_id') . "." . $request->input('fpa_comprobante_formato') );
                    DB::commit();
                } catch (Exception $e){
                    $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO_ARCHIVO" ];
                    $data['razon'] = "Ocurrió un error al eliminar comprobante de adopción";
                    Log::error( $e->getMessage(), $data );
                    DB::rollBack();
                }
            } catch (Exception $e) {
                $data['codigo'] = Util::$codigos[ "ERROR_ENVIANDO_EMAIL" ];
                $data['razon'] = "Ocurrió un error al enviar correo de rechazo de adopción";
                Log::error( $e->getMessage(), $data );
                DB::rollBack();
            }
            if ($resultado <= 0) {
                $data[ 'codigo' ] =  Util::$codigos[ "NO_ENCONTRADO" ];
            }
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_ELIMINANDO" ];
            $data['razon'] = "Ocurrió un error al rechazar la adopción";
            Log::error( $e->getMessage(), $data );
            DB::rollBack();
        }
        return $data;
    }
}