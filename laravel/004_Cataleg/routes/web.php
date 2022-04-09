<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ProductoController;
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


Route::resource('/categoria', CategoriaController::class);
Route::resource('/comentario', ComentarioController::class);
Route::resource('/producto', ProductoController::class);

Route::get('/', function () {
    return view('listado-categorias', ['categoria' => []]);
});