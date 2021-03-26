<?php

use Illuminate\Support\Facades\Route;

/*RUTAS DE AUTENTICACIÓN*/
Auth::routes( [ 'register' => false, 'verify' => false ] );

// -_-_-_-_--_-_-_-_--_-_-_-_--_-_-_-
// -_-_-_-_- RUTAS PRIVADAS -_-_-_-_-
// -_-_-_-_--_-_-_-_--_-_-_-_--_-_-_-

Route::group( [ 'middleware' => [ 'auth', 'rolecheck' ] ], function(){
	/*RUTA DE MANTENIMIENTO DE USUARIOS*/
	Route::get('/usuarios', [App\Http\Controllers\FudebiolDigital\UsuariosController::class, 'MantenimientoUsuarios'])->name('usuarios');
	Route::post('/editarUsuario', [App\Http\Controllers\FudebiolDigital\UsuariosController::class, 'editarUsuario'])->name('editarUsuario');
	Route::post('/eliminarUsuarios', [App\Http\Controllers\FudebiolDigital\UsuariosController::class, 'eliminarUsuarios'])->name('eliminarUsuarios');

	/*RUTAS DE MANTENIMIENTO DE ESPECIES*/
	Route::get('/registrarArbol/{pagina}', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\ArbolesController@registrarArbol', 'role' => 'A' ])->name('registrarArbol');
	Route::post('/editarArbol', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\ArbolesController@editarArbol', 'role' => 'A' ])->name('editarArbol');
	Route::get('/registroArbol', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\ArbolesController@registroArbol', 'role' => 'A' ])->name('registroArbol');

	/*RUTAS DE MANTENIMIENTOS DE PADRINOS*/
	Route::get('/verPadrinos', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\PadrinosController@mantenimientoPadrinos', 'role' => 'A' ])->name('verPadrino');

	/*RUTAS DE MANTENIMIENTO DE LOTES*/
	Route::get( '/lotes/{pagina}', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\LotesController@mantenimientoLotes', 'role' => 'A' ] )->name( 'lotes' );
	Route::post('/editarLote', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\LotesController@editarLote', 'role' => 'A' ])->name('editarLote');
	Route::post('/eliminarLotes', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\LotesController@eliminarLotes', 'role' => 'A' ])->name('eliminarLotes');

	
	/*RUTAS DE MENSAJES*/
	Route::get('/mensajes/{pagina}', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\MensajesController@mantenimientoMensajes', 'role' => 'A' ])->name('mensajes');
	Route::post('/eliminarMensajes', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\MensajesController@eliminarMensajes', 'role' => 'A' ])->name('eliminarMensajes');
	Route::post('/marcarLeidos', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\MensajesController@marcarMensajeComoLeidos', 'role' => 'A' ])->name('marcarLeidos');
	/*RUTA DE NOTIFICIONES*/
	Route::get('/notificaciones', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\InformacionController@notificaciones', 'role' => 'A' ])->name('notificaciones');
	/*RUTA DE PUBLICACIONES*/
	Route::get('/editorPublicaciones', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\PublicacionesController@editorPublicaciones', 'role' => 'S' ])->name('editorPublicaciones');
	Route::get('/administrarPublicaciones', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\PublicacionesController@administrarPublicaciones', 'role' => 'S'])->name('administrarPublicaciones');
	/*RUTA DE GALERIA*/
	Route::get('/editorGaleria', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\GaleriaController@editarGaleria', 'role' => 'S' ])->name('editorGaleria');
	Route::post('/guardarFotos', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\GaleriaController@guardarFotos', 'role' => 'S' ])->name('guardarFotos');
	Route::post('/editarFoto', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\GaleriaController@editarFoto', 'role' => 'S' ])->name('editarFoto');

	/*RUTA DE REPORTES */
	Route::get('/reporteArboles', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\ArbolesController@reporteGlobal', 'role' => 'A' ])->name('reporteArboles');
	Route::get('/reporteEspecies', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\ArbolesController@reporteEspecifico', 'role' => 'A' ])->name('reporteEspecies');
	Route::get('/reportePadrinos', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\PadrinosController@reporteGlobal', 'role' => 'A' ])->name('reportePadrinos');
	Route::get('/reportePadrino', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\PadrinosController@reporteEspecifico', 'role' => 'A' ])->name('reportePadrino');

});


// -_-_-_-_--_-_-_-_--_-_-_-_--_-_-_-
// -_-_-_-_- RUTAS PÚBLICAS -_-_-_-_-
// -_-_-_-_--_-_-_-_--_-_-_-_--_-_-_- 

Route::get('/',  [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/introduccion', [App\Http\Controllers\FudebiolDigital\ArbolesController::class, 'introduccionMAPLV'])->name('introduccion');
Route::get('/galeria', [App\Http\Controllers\FudebiolDigital\GaleriaController::class, 'galeria'])->name('galeria');
Route::get('/atracciones', [App\Http\Controllers\FudebiolDigital\InformacionController::class, 'informacion'])->name('atracciones');
Route::get('/fudebiol', [App\Http\Controllers\FudebiolDigital\InformacionController::class, 'sobreNosotros'])->name('sobreNosotros');
Route::get('/publicaciones', [App\Http\Controllers\FudebiolDigital\PublicacionesController::class, 'publicaciones'])->name('publicaciones');
Route::get('/investigaciones', [App\Http\Controllers\FudebiolDigital\InvestigacionesController::class, 'investigaciones'])->name('investigaciones');
Route::get('/registrarPadrino', [App\Http\Controllers\FudebiolDigital\PadrinosController::class, 'registrarPadrinos'])->name('registrarPadrino');
Route::get('/arboles', [App\Http\Controllers\FudebiolDigital\LotesController::class, 'arbolesPorLote'])->name('arboles');
Route::get('/adoptarArbol', [App\Http\Controllers\FudebiolDigital\ArbolesController::class, 'adoptarArbol'])->name('adoptarArbol');
Route::get('/comprobante', [App\Http\Controllers\FudebiolDigital\ArbolesController::class, 'comprobante'])->name('comprobante');
Route::post('/enviarMensaje', [ 'uses' => 'App\Http\Controllers\FudebiolDigital\MensajesController@enviarMensaje'])->name('enviarMensaje');
