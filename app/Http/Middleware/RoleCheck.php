<?php
	namespace App\Http\Middleware;

	use Closure;
	use Illuminate\Http\Request;

	class RoleCheck{
		public function handle( Request $request, Closure $next ){
			$role = $request->route()->getAction( "role", "" );
			if ( strlen( $role ) == 0 || $role == $request->user()->role ){
				return $next( $request );
			}

			return redirect()->back()->with( "errores", array(
				"No tienes permiso para accesar esta ruta"
			) );
		}
	}
?>