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
 /*RUTA DE INICIO*/
Auth::routes();

// -_-_-_-_--_-_-_-_--_-_-_-_--_-_-_-
// -_-_-_-_- RUTAS PRIVADAS -_-_-_-_-
// -_-_-_-_--_-_-_-_--_-_-_-_--_-_-_-
Route::group( [ 'middleware' => 'auth' ], function(){
	Route::get('/',  [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	/*RUTAS DE AUTENTICACIÓN*/

	/*RUTA DE MANTENIMIENTO DE USUARIOS*/
	Route::get('/usuarios', [App\Http\Controllers\FudebiolDigital\UsuariosController::class, 'MantenimientoUsuarios'])->name('usuarios');
	Route::post('/insertarUsuario', [App\Http\Controllers\FudebiolDigital\UsuariosController::class, 'insertarUsuario'])->name('insertarUsuario');
	/*RUTAS DE MANTENIMIENTO DE ÁRBOLES*/
	Route::get('/registrarArbol', [App\Http\Controllers\FudebiolDigital\ArbolesController::class, 'registrarArbol'])->name('registrarArbol');

	/*RUTAS DE MANTENIMIENTOS DE PADRINOS*/
	Route::get('/registrarPadrino', [App\Http\Controllers\FudebiolDigital\PadrinosController::class, 'mantenimientoPadrinos'])->name('registrarPadrino');

	/*RUTAS DEMANTENIMIENTO DE LOTES*/
	Route::get('/registrarLote', [App\Http\Controllers\FudebiolDigital\LotesController::class, 'mantenimientoLotes'])->name('registrarLote');

	Route::get('/arboles', [App\Http\Controllers\FudebiolDigital\LotesController::class, 'arbolesPorLote'])->name('arboles');
});


// -_-_-_-_--_-_-_-_--_-_-_-_--_-_-_-
// -_-_-_-_- RUTAS PÚBLICAS -_-_-_-_-
// -_-_-_-_--_-_-_-_--_-_-_-_--_-_-_-
Route::group( [ 'middleware' => 'guest' ], function(){
	/*RUTA DE GALERIA*/
	Route::get('/galeria', [App\Http\Controllers\FudebiolDigital\GaleriaController::class, 'galeria'])->name('galeria');
} );