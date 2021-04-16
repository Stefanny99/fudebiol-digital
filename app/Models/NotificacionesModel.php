<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;
use GImage\Image;

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
                    ->select(
                        "fpa.fpa_id", "fpa.fpa_fecha_adopcion", "fpa.fpa_comprobante_formato", "fp.fp_cedula", "fp.fp_nombre_completo",
                        "fp.fp_correo", "fl.fl_nombre", "fa.fa_nombres_comunes", "fal.fal_coordenada_W", "fal.fal_coordenada_N",
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
            $resultado = DB::table('fudebiol_padrinos_arboles')->where( 'fpa_id', $request->input('fpa_id'))
                        ->update([
                            'fpa_estado' => 'A',
                        ]);
            $this->generarCertificado( $request->input('fpa_id') );
            try {
                $details = [
                    'nombre' => 'Stefanny Barrantes',
                    'especie' => 'Espavel',
                    'lote' => 'L1',
                    'estado' => '1',
                    'certificado' => 'http://fudebiol.com/images/logo_06.png'
                ];
                \Mail::to('barrantesdenia@gmail.com')->send(new \App\Mail\FudebiolMail($details));
            } catch (Exception $e) {
                Log::error( $e->getMessage(), $data );
            }
            // Storage::delete( "public/comprobantes/" . $request->input('fpa_id') . "." . $request->input('fpa_comprobante_formato') );
            if ($resultado <= 0) {
                $data[ 'codigo' ] =  Util::$codigos[ "NO_ENCONTRADO" ];
            }
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_ACTUALIZACION" ];
            Log::error( $e->getMessage(), $data );
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
            $resultado = DB::table('fudebiol_padrinos_arboles')->where('fpa_id', $request->input('fpa_id'))->delete();
            try {
                $details = [
                    'nombre' => 'Stefanny Barrantes',
                    'especie' => 'Espavel',
                    'lote' => 'L1',
                    'estado' => '0',
                    'certificado' => 'http://fudebiol.com/images/logo_06.png'
                ];
                \Mail::to('barrantesdenia@gmail.com')->send(new \App\Mail\FudebiolMail($details));
            } catch (Exception $e) {
                Log::error( $e->getMessage(), $data );
            }
            // Storage::delete( "public/comprobantes/" . $request->input('fpa_id') . "." . $request->input('fpa_comprobante_formato') );
            if ($resultado <= 0) {
                $data[ 'codigo' ] =  Util::$codigos[ "NO_ENCONTRADO" ];
            }
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_ELIMINANDO" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function generarCertificado( $id_adopcion ) {
        try {
            $img_certificado = new Image();
            $img_certificado
                ->load(asset('/img/certificados/machote.jpg'))
                ->setTop(60)
                ->setLeft(70);
            // $padrino = new Text("Stefanny Barrantes Vargas");
            // $padrino
            //     ->setSize(12)
            //     ->setWidth(300)
            //     ->setLeft(210)
            //     ->setTop(75)
            //     ->setColor(0, 0, 0)
            //     ->setFontface('fonts/Lato-Light.ttf');

            // $canvas = new Canvas($canvas_figure);
            // $canvas
            //     ->append([
            //         $img_certificado,
            //         $padrino
            //     ])
            //     ->toJPG()
            //     ->draw()
            //     ->save('public/img/certificados/certificado.png');
            //$request->file( 'fa_imagen' )->storeAs( "public/img/fudebiol_arboles/", $arbol_id . '.' . $request->file( 'fa_imagen' )->extension() );
        } catch ( Exception $e ){
            Log::error( $e->getMessage(), $data );
        }
        return;
    }
}