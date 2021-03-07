<?php

use Illuminate\Support\Facades\Route;

/*RUTAS DE AUTENTICACIÓN*/
Auth::routes();

// -_-_-_-_--_-_-_-_--_-_-_-_--_-_-_-
// -_-_-_-_- RUTAS PRIVADAS -_-_-_-_-
// -_-_-_-_--_-_-_-_--_-_-_-_--_-_-_-
Route::group( [ 'middleware' => 'auth' ], function(){
	 /*RUTA DE INICIO*/
	Route::get('/',  [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	/*RUTA DE MANTENIMIENTO DE USUARIOS*/
	Route::get('/usuarios', [App\Http\Controllers\FudebiolDigital\UsuariosController::class, 'MantenimientoUsuarios'])->name('usuarios');
	Route::post('/editarUsuario', [App\Http\Controllers\FudebiolDigital\UsuariosController::class, 'editarUsuario'])->name('editarUsuario');
	Route::post('/eliminarUsuarios', [App\Http\Controllers\FudebiolDigital\UsuariosController::class, 'eliminarUsuarios'])->name('eliminarUsuarios');

	/*RUTAS DE MANTENIMIENTO DE ESPECIES*/
	Route::get('/registrarArbol/{pagina}', [App\Http\Controllers\FudebiolDigital\ArbolesController::class, 'registrarArbol'])->name('registrarArbol');
	Route::post('/editarArbol', [App\Http\Controllers\FudebiolDigital\ArbolesController::class, 'editarArbol'])->name('editarArbol');

	/*RUTAS DE MANTENIMIENTOS DE PADRINOS*/
	Route::get('/verPadrinos', [App\Http\Controllers\FudebiolDigital\PadrinosController::class, 'mantenimientoPadrinos'])->name('verPadrino');
	Route::get('/registrarPadrino', [App\Http\Controllers\FudebiolDigital\PadrinosController::class, 'registrarPadrinos'])->name('registrarPadrino');

	/*RUTAS DE MANTENIMIENTO DE LOTES*/
	Route::get( '/lotes/{pagina}', [App\Http\Controllers\FudebiolDigital\LotesController::class, 'mantenimientoLotes'] )->name( 'lotes' );
	Route::post('/editarLote', [App\Http\Controllers\FudebiolDigital\LotesController::class, 'editarLote'])->name('editarLote');
	Route::post('/eliminarLotes', [App\Http\Controllers\FudebiolDigital\LotesController::class, 'eliminarLotes'])->name('eliminarLotes');

	Route::get('/arboles', [App\Http\Controllers\FudebiolDigital\LotesController::class, 'arbolesPorLote'])->name('arboles');

	Route::get('/galeria', [App\Http\Controllers\FudebiolDigital\GaleriaController::class, 'galeria'])->name('galeria');

	Route::get('/introduccion', [App\Http\Controllers\FudebiolDigital\ArbolesController::class, 'introduccionMAPLV'])->name('introduccion');
	/*RUTAS DE MENSAJES*/
	Route::get('/mensajes', [App\Http\Controllers\FudebiolDigital\InformacionController::class, 'mensajes'])->name('mensajes');
	/*RUTA DE NOTIFICIONES*/
	Route::get('/notificaciones', [App\Http\Controllers\FudebiolDigital\InformacionController::class, 'notificaciones'])->name('notificaciones');
	/*RUTA DE PUBLICACIONES*/
	Route::get('/editorPublicaciones', [App\Http\Controllers\FudebiolDigital\PublicacionesController::class, 'editorPublicaciones'])->name('editorPublicaciones');
	Route::get('/administrarPublicaciones', [App\Http\Controllers\FudebiolDigital\PublicacionesController::class, 'administrarPublicaciones'])->name('administrarPublicaciones');
/*RUTA DE GALERIA*/
	Route::get('/editorGaleria', [App\Http\Controllers\FudebiolDigital\GaleriaController::class, 'editarGaleria'])->name('editorGaleria');
	/*RUTA DE ARBOLES */
	Route::get('/registroArbol', [App\Http\Controllers\FudebiolDigital\ArbolesController::class, 'registroArbol'])->name('registroArbol');

});


// -_-_-_-_--_-_-_-_--_-_-_-_--_-_-_-
// -_-_-_-_- RUTAS PÚBLICAS -_-_-_-_-
// -_-_-_-_--_-_-_-_--_-_-_-_--_-_-_- 

Route::get('/galeria', [App\Http\Controllers\FudebiolDigital\GaleriaController::class, 'galeria'])->name('galeria');
Route::get('/atracciones', [App\Http\Controllers\FudebiolDigital\InformacionController::class, 'informacion'])->name('atracciones');
Route::get('/fudebiol', [App\Http\Controllers\FudebiolDigital\InformacionController::class, 'sobreNosotros'])->name('sobreNosotros');
Route::get('/publicaciones', [App\Http\Controllers\FudebiolDigital\PublicacionesController::class, 'publicaciones'])->name('publicaciones');
Route::get('/investigaciones', [App\Http\Controllers\FudebiolDigital\InvestigacionesController::class, 'investigaciones'])->name('investigaciones');
Route::get('/adoptarArbol', [App\Http\Controllers\FudebiolDigital\ArbolesController::class, 'adoptarArbol'])->name('adoptarArbol');
Route::get('/comprobante', [App\Http\Controllers\FudebiolDigital\ArbolesController::class, 'comprobante'])->name('comprobante');
