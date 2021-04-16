<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Util;
Use Exception;

class ArbolesModel extends Model {
    public function obtenerArboles( $pagina, $nombre_arbol ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "ArbolesModel:obtenerArboles"
        );
        try{
            $data['resultado'] = DB::table('fudebiol_arboles')
            ->where('fa_nombre_cientifico', 'like', '%'.$nombre_arbol.'%')
            ->orWhere('fa_nombres_comunes', 'like', '%'.$nombre_arbol.'%')
            ->skip( ( $pagina - 1 ) * 8 )->take( 8 )->get();
        }catch(Exception $e){
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function cantidadPaginas( $nombre_arbol ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "ArbolesModel:cantidadPaginas"
        );
        try{
            $data[ "resultado" ] = ceil( DB::table( "fudebiol_arboles" )
            ->where('fa_nombre_cientifico', 'like', '%'.$nombre_arbol.'%')
            ->orWhere('fa_nombres_comunes', 'like', '%'.$nombre_arbol.'%')
            ->count() / 8 );
        }catch ( Exception $e ){
            $data[ "codigo" ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function eliminarArboles($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "ArbolesModel:eliminarArboles"
        );
        try {
            $arboles = DB::table( "fudebiol_arboles" )->whereIn( 'fa_id', $request->input( "fa-arboles-eliminados" ) )->get();
            DB::begintransaction();
            try {
                DB::table('fudebiol_arboles')->whereIn('fa_id', $request->input('fa-arboles-eliminados'))->delete();
                foreach ( $arboles as $arbol ) {
                    Storage::delete( "public/img/fudebiol_arboles/" . $arbol->FA_ID . "." . $arbol->FA_IMAGEN_FORMATO );
                }
                DB::commit();
            } catch (Exception $e) {
                $data['codigo'] = Util::$codigos[ "ERROR_ELIMINANDO" ];
                $data['razon'] = "Ocurrió un error al eliminar el árbol";
                DB::rollBack();
            }    
        }catch(Exception $e){
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function crearArbol( $request ){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "ArbolesModel:crearArbol"
        );
        try {
            DB::begintransaction();
            try {
                $arbol_id = DB::table('fudebiol_arboles')->insertGetId([
                    'fa_nombre_cientifico' => $request->input('fa_nombre_cientifico'),
                    'fa_jiffys' => $request->input('fa_jiffys'),
                    'fa_bolsas' => $request->input('fa_bolsas'),
                    'fa_elevacion_minima' => $request->input('fa_elevacion_minima'),
                    'fa_elevacion_maxima' => $request->input('fa_elevacion_maxima'),
                    'fa_imagen_formato' => $request->hasFile( 'fa_imagen' ) ? $request->file( "fa_imagen" )->extension() : '',
                    'fa_nombres_comunes' => $request->input('fa_nombres_comunes'),
                ]);
                if ( $request->hasFile( 'fa_imagen' ) ){
                    try{
                        $request->file( 'fa_imagen' )->storeAs( "public/img/fudebiol_arboles/", $arbol_id . '.' . $request->file( 'fa_imagen' )->extension() );
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
                $data['codigo'] = Util::$codigos[ "ERROR_DE_INSERCION" ];
                $data['razon'] = "Ocurrió un error al insertar el árbol";
                Log::error( $e->getMessage(), $data );
                DB::rollBack();
            }    
        } catch (Exception $e) {
            $data['codigo'] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function editarArbol($request){
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "ArbolesModel:editarArbol"
        );
        try{
            DB::begintransaction();
            try {
                $input_data = array(
                    'fa_nombre_cientifico' => $request->input('fa_nombre_cientifico'),
                    'fa_jiffys' => $request->input('fa_jiffys'),
                    'fa_bolsas' => $request->input('fa_bolsas'),
                    'fa_elevacion_minima' => $request->input('fa_elevacion_minima'),
                    'fa_elevacion_maxima' => $request->input('fa_elevacion_maxima'),
                    'fa_nombres_comunes' => $request->input('fa_nombres_comunes')
                );
                if ( $request->hasFile( "fa_imagen" ) ){
                    $input_data[ 'fa_imagen_formato' ] = $request->hasFile( 'fa_imagen' ) ? $request->file( "fa_imagen" )->extension() : '';
                }
                DB::table('fudebiol_arboles')->where('fa_id',$request->input('fa_id'))->update( $input_data );
                if ( $request->hasFile( 'fa_imagen' ) ){
                    try{
                        $request->file( 'fa_imagen' )->storeAs( "public/img/fudebiol_arboles/", $request->input( "fa_id" ) . '.' . $request->file( 'fa_imagen' )->extension() );
                        DB::commit();
                        if ( $request->file( 'fa_imagen' )->extension() != $request->input( 'fa_imagen_formato' ) ){
                            try{
                                Storage::delete( "public/img/fudebiol_arboles/_img/" . $request->input( 'fa_id' ) . "." . $request->input( 'fa_imagen_formato' ) );
                            }catch ( Exception $e ){
                                Log::error( $e->getMessage(), array(
                                    'codigo' => Util::$codigos[ "ERROR_ELIMINANDO_ARCHIVO" ],
                                    'razon' => "Ocurrió un error al eliminar la imagen 'public/img/fudebiol_arboles/" . $request->input( 'fa_id' ) . "." . $request->input( 'fa_imagen_formato' ) . "'",
                                ) );
                            }
                        }
                    }catch( Exception $e ){
                        $data[ "codigo" ] = Util::$codigos[ "ERROR_SUBIENDO_ARHIVO" ];
                        $data[ "razon" ] = "Ocurrió un error al subir la imagen " . $request->file( "fa_imagen" )->getClientOriginalName();
                        Log::error( $e->getMessage(), $data );
                        DB::rollBack();
                    }
                } else {
                    DB::commit();
                }
            } catch (Exception $e) {
                $data['codigo'] = Util::$codigos[ "ERROR_DE_ACTUALIZACION" ];
                $data['razon'] = "Ocurrió un error al editar el árbol";
                Log::error( $e->getMessage(), $data );
                DB::rollBack();
            } 
        }catch(Exception $e){
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }

    public function reporteGlobal () {
        $data = array(
            "codigo" => Util::$codigos[ "EXITO" ],
            "razon" => "",
            "accion" => "ArbolesModel:reporteGlobal",
            "resultado" => array(),
        );
        try{
            $data [ "resultado" ] [ "total_arboles"] = DB::table("fudebiol_arboles")->count();
            $data [ "resultado" ] [ "total_adoptados" ] = DB::table("fudebiol_padrinos_arboles")->where("fpa_estado", "A")->count();
            $especies = DB::table( "fudebiol_padrinos_arboles AS fpa" )
                        ->select( "fa.fa_nombres_comunes", DB::raw("COUNT(fpa.fpa_id) as total_adoptados") )
                        ->join( "fudebiol_arboles_lote as fal", "fal.fal_id", "=", "fpa.fpa_arbol_lote_id" )
                        ->join( "fudebiol_arboles as fa", "fa.fa_id", "=", "fal.fal_arbol_id" )
                        ->where( "fpa.fpa_estado", "A" )
                        ->groupBy ( "fa.fa_nombres_comunes" )
                        ->orderBy ( "total_adoptados", "DESC")
                        ->take( 10 )
                        ->get();
            $data[ "resultado" ][ "especies" ] = array();
            $data[ "resultado" ][ "cantidad" ] = array();
            foreach ($especies as $especie) {
                $data[ "resultado" ][ "especies" ][]= $especie->fa_nombres_comunes;
                $data[ "resultado" ][ "cantidad" ][]= $especie->total_adoptados;
            }
        }catch(Exception $e){
            $data[ 'codigo' ] = Util::$codigos[ "ERROR_DE_SERVIDOR" ];
            Log::error( $e->getMessage(), $data );
        }
        return $data;
    }
}