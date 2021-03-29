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
                                ->where('fp_nombre_completo', 'like', '%'.$padrino.'%')
                                ->orWhere('fp_cedula', 'like', '%'.$padrino.'%')
                                ->skip( ( $pagina - 1 ) * 8 )->take( 8 )->get();
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
        } catch (Exception $e) {
            $data[ 'codigo' ] =  Util::$codigos[ "ERROR_DE_INSERCION" ];
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
        }
        return $data;
    }
}