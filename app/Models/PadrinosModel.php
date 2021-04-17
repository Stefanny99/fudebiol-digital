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
}