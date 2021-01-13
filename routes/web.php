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
Route::get('/',  [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*RUTAS DE AUTENTICACIÓN*/
Auth::routes();
/*RUTA DE MANTENIMIENTO DE USUARIOS*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*RUTA DE GALERIA*/
Route::get('/galeria', [App\Http\Controllers\FudebiolDigital\GaleriaController::class, 'galeria'])->name('galeria');

Route::get('/usuarios', [App\Http\Controllers\FudebiolDigital\UsuariosController::class, 'MantenimientoUsuarios'])->name('usuarios');

Route::post('/insertarUsuario', [App\Http\Controllers\FudebiolDigital\UsuariosController::class, 'insertarUsuario'])->name('insertarUsuario');