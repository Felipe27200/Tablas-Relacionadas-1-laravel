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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


// Se indica la ruta para los CRUDs de las dos tablas
// en el segundo argumentos se indica la ruta hacia sus controladores
// El primero indica que si en la ruta se define con ese valor entonces lo lleve a la ruta del segundo argumento

// el método middleware() indica que primero debe validar la autenticación antes de redirigir a las rutas
Route::resource('libros', App\Http\Controllers\LibroController::class)->middleware('auth');
Route::resource('categorias', App\Http\Controllers\CategoriaController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
