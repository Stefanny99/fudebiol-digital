<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

	/*RUTAS DE MANTENIMIENTO DE ÁRBOLES*/
	Route::get('/registrarArbol', [App\Http\Controllers\FudebiolDigital\ArbolesController::class, 'registrarArbol'])->name('registrarArbol');
	Route::post('/editarArbol', [App\Http\Controllers\FudebiolDigital\ArbolesController::class, 'editarArbol'])->name('editarArbol');

	/*RUTAS DE MANTENIMIENTOS DE PADRINOS*/
	Route::get('/registrarPadrino', [App\Http\Controllers\FudebiolDigital\PadrinosController::class, 'mantenimientoPadrinos'])->name('registrarPadrino');

	/*RUTAS DEMANTENIMIENTO DE LOTES*/
	Route::get('/registrarLote', [App\Http\Controllers\FudebiolDigital\LotesController::class, 'mantenimientoLotes'])->name('registrarLote');

	Route::get('/arboles', [App\Http\Controllers\FudebiolDigital\LotesController::class, 'arbolesPorLote'])->name('arboles');

	Route::get('/galeria', [App\Http\Controllers\FudebiolDigital\GaleriaController::class, 'galeria'])->name('galeria');

	Route::get('/introduccion', [App\Http\Controllers\FudebiolDigital\ArbolesController::class, 'introduccionMAPLV'])->name('introduccion');

	
});


// -_-_-_-_--_-_-_-_--_-_-_-_--_-_-_-
// -_-_-_-_- RUTAS PÚBLICAS -_-_-_-_-
// -_-_-_-_--_-_-_-_--_-_-_-_--_-_-_-

Route::get('/galeria', [App\Http\Controllers\FudebiolDigital\GaleriaController::class, 'galeria'])->name('galeria');
Route::get('/atracciones', [App\Http\Controllers\FudebiolDigital\InformacionController::class, 'informacion'])->name('atracciones');