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
            $data[ "resultado" ] = ceil( DB::table( "fudebiol_lotes" )
            ->where('fp_nombre_completo', 'like', '%'.$padrino.'%')
            ->orWhere('fp_cedula', 'like', '%'.$padrino.'%')
            ->count() / 8 );
        }catch ( Exception $e ){
            $data[ "codigo" ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function eliminarPadrino($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "eliminarPadrino"
        );
        try{
            DB::table('fudebiol_padrinos')->where('fp_id', $request->input('fp_id'))->delete();
        }catch(Exception $e){
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_ELIMINANDO" ];
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

    public function obtenerAdopcion( $fpa_id ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "PadrinosModel:obtenerAdopcion"
        );
        try{
            $data[ "resultado" ] = DB::table( "fudebiol_padrinos_arboles AS pa" )
            ->join( "fudebiol_padrinos AS p", "p.fp_id", "=", "pa.fpa_padrino_id" )
            ->join( "fudebiol_arboles_lote AS al", "al.fal_id", "=", "pa.fap_arbol_lote_id" )
            ->join( "fudebiol_arboles AS a", "a.fa_id", "=", "al.fal_arbol_id" )
            ->select( "p." )
            ->first();
        }catch ( Exception $e ){
            $data[ "codigo" ] = Util::$codigos[ "NO_ENCONTRADO" ];
            $data[ "razon" ] = "ocurrió un problema al recuperar los datos de la adopción";
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }
}