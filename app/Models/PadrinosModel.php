<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

class PadrinosModel extends Model {

    public function obtenerPadrinos($pagina, $padrino){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "PadrinosModel:obtenerPadrinos"
        );
        try{
            $data['resultado'] = DB::table('fudebiol_padrinos')
                                ->whereNotNull('fp_cedula')
                                ->where('fp_nombre_completo', 'like', '%'.$padrino.'%')
                                ->orWhere('fp_cedula', 'like', '%'.$padrino.'%')
                                ->skip( ( $pagina - 1 ) * 8 )->take( 8 )->get();
        }catch(Exception $e){
            $data['codigo'] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function obtenerPadrino( $id ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "PadrinosModel:obtenerPadrino"
        );
        try{
            $data['resultado'] = DB::table('fudebiol_padrinos')
                                ->where('fp_id', $id)->first();
        }catch(Exception $e){
            $data['codigo'] =  Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function cantidadPaginas( $padrino ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "PadrinosModel:cantidadPaginas"
        );
        try{
            $data[ "resultado" ] = ceil( DB::table( "fudebiol_padrinos" )
            ->where('fp_nombre_completo', 'like', '%'.$padrino.'%')
            ->orWhere('fp_cedula', 'like', '%'.$padrino.'%')
            ->count() / 8 );
        }catch ( Exception $e ){
            $data[ "codigo" ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function eliminarPadrinos($request){
        $data = array(
            "errores" => array(),
            "accion" => "PadrinosModel:eliminarPadrinos"
        );
        try{
            foreach ($request->input('padrinos_eliminar') as $idpadrino => $nombre_padrino) {
                $padrino = DB::table('fudebiol_padrinos as fp')
                            ->join('fudebiol_padrinos_arboles as fpa', 'fp.FP_ID', '=', 'fpa.FPA_PADRINO_ID')
                            ->select('fp.FP_NOMBRE_COMPLETO', 'fp.FP_ID', 'fpa.FPA_PADRINO_ID')
                            ->where('fp.FP_ID', $idpadrino)->first();
                if ($padrino) {
                    array_push( $data[ 'errores'] , 'No se puede eliminar el padrino ' . $padrino->FP_NOMBRE_COMPLETO . ' porque tiene adopciones' );
                } else {
                    try {
                        DB::table('fudebiol_padrinos')->where('fp_id', $idpadrino)->delete();
                    } catch (Exception $e){
                        array_push( $data[ 'errores' ], "Ocurrió un error eliminando padrino" . $nombre_padrino);
                        Log::error( $e->getMessage(), $data );
                    }
                }
            } 
        }catch(Exception $e){
            array_push( $data[ 'errores' ], "Ocurrió un error en el servidor eliminando padrinos" );
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function crearPadrino($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "crearPadrino"
        );
        try {
            $data['resultado'] =  DB::table('fudebiol_padrinos')->insertGetId([
                'fp_cedula' => $request->input('fp_cedula'),
                'fp_nombre_completo' => $request->input('fp_nombre_completo'),
                'fp_tipo' => $request->input('fp_tipo'),
                'fp_correo' => $request->input('fp_correo')
            ]);
        }catch ( Exception $e ){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_INSERCION" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function editarPadrino($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "editarPadrino"
        );
        try{
            DB::table('fudebiol_padrinos')->where('fp_id',$request->input('fp_id'))
            ->update([
                'fp_cedula' => $request->input('fp_cedula'),
                'fp_nombre_completo' => $request->input('fp_nombre_completo'),
                'fp_tipo' => $request->input('fp_tipo')
            ]);
        }catch(Exception $e){
            $data['codigo'] = Util::$codigos[ "ERROR_DE_ACTUALIZACION" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function buscarPadrino( $request ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "PadrinosModel:buscarPadrino"
        );
        try{
            $data[ "resultado" ] = DB::table( "fudebiol_padrinos" )
            ->where( "fp_cedula", "=", $request->input( "fp_cedula" ) )
            ->first();
            if ( !$data[ "resultado" ] ){
                $data[ "codigo" ] = Util::$codigos[ "NO_ENCONTRADO" ];
            }
        }catch ( Exception $e ){
            $data[ "codigo" ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function reporteGlobal( ) {
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "PadrinosModel:reporteGlobal"
        );
        try{
            $resultados = DB::table("fudebiol_padrinos as fp")
                        ->select(DB::raw("COUNT(fpa.fpa_id) as cantidad_adopciones"),"fp.FP_NOMBRE_COMPLETO")
                        ->join("fudebiol_padrinos_arboles as fpa", "fp.FP_ID", "=", "fpa.FPA_PADRINO_ID")
                        ->where("fpa.FPA_ESTADO", "A")
                        ->groupBy("fp.FP_NOMBRE_COMPLETO")
                        ->orderBy("cantidad_adopciones", "DESC")
                        ->take(7)
                        ->get();

            $data[ "padrinos" ] = array();
            $data[ "cantida_adopciones" ] = array();
            foreach ($resultados as $resultado) {
                $data[ "padrinos" ][]= $resultado->FP_NOMBRE_COMPLETO;
                $data[ "cantidad_adopciones" ][]= $resultado->cantidad_adopciones;
            }
        }catch(Exception $e){
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function reporteEspecifico( $fp_id ) {
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "PadrinosModel:reporteEspecifico"
        );
        try{
            $data['padrino'] = DB::table("fudebiol_padrinos as fp")
                            ->select(DB::raw("COUNT(fpa.fpa_id) as cantidad_adopciones"),"fp.FP_NOMBRE_COMPLETO")
                            ->join("fudebiol_padrinos_arboles as fpa", "fp.FP_ID", "=", "fpa.FPA_PADRINO_ID")
                            ->where("fpa.FPA_ESTADO", "A")
                            ->where("fp.FP_ID", $fp_id)
                            ->groupBy("fp.FP_NOMBRE_COMPLETO")
                            ->first();

            $data['adopciones'] = DB::table("fudebiol_padrinos as fp")
                                ->select(DB::raw("COUNT(fpa.fpa_id) as cantidad_adopciones"),"fa.FA_NOMBRES_COMUNES")
                                ->join("fudebiol_padrinos_arboles as fpa", "fp.FP_ID", "=", "fpa.FPA_PADRINO_ID")
                                ->join("fudebiol_arboles_lote as fal", "fpa.FPA_ARBOL_LOTE_ID", "=", "fal.FAL_ID")
                                ->join("fudebiol_arboles as fpa", "fal.FAL_ARBOL_ID", "=", "fa.FA_ID")
                                ->where("fpa.FPA_ESTADO", "A")
                                ->where("fp.FP_ID", $fp_id)
                                ->groupBy("fa.FA_NOMBRES_COMUNES")
                                ->get();
        }catch(Exception $e){
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }
    
    public function obtenerAdopcion( $fpa_id ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "PadrinosModel:obtenerAdopcion"
        );
        try{
            $data[ "resultado" ] = DB::table( "fudebiol_padrinos_arboles AS pa" )
            ->join( "fudebiol_padrinos AS p", "p.fp_id", "=", "pa.fpa_padrino_id" )
            ->join( "fudebiol_arboles_lote AS al", "al.fal_id", "=", "pa.fpa_arbol_lote_id" )
            ->join( "fudebiol_arboles AS a", "a.fa_id", "=", "al.fal_arbol_id" )
            ->join( "fudebiol_lotes AS l", "l.fl_id", "=", "al.fal_lote_id" )
            ->where( "pa.fpa_id", "=", $fpa_id )
            ->select( "pa.fpa_id AS FPA_ID", "p.fp_nombre_completo AS FP_NOMBRE_COMPLETO", "l.fl_nombre AS FL_NOMBRE", "al.fal_coordenada_n AS FAL_COORDENADA_N", "al.fal_coordenada_w AS FAL_COORDENADA_W", "pa.fpa_estado AS FPA_ESTADO", "a.fa_nombre_cientifico AS FA_NOMBRE_CIENTIFICO", "a.fa_nombres_comunes AS FA_NOMBRES_COMUNES" )
            ->first();
            if ( $data[ "resultado" ] ){
                if ( $data[ "resultado" ]->FPA_ESTADO != "A" ){
                    $data[ "codigo" ] = Util::$codigos[ "EN_ESPERA" ];
                    $data[ "razon" ] = "su adopción no se ha aprobado aún";    
                }
            }else{
                $data[ "codigo" ] = Util::$codigos[ "NO_ENCONTRADO" ];
                $data[ "razon" ] = "no se encontraron datos de adopción";
            }
        }catch ( Exception $e ){
            $data[ "codigo" ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            $data[ "razon" ] = "ocurrió un problema al recuperar los datos de la adopción";
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }
}