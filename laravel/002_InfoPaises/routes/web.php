<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;
use App\Http\Controllers\PaisController;

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

Route::post('/pais',[PaisController::class, 'pais']);
Route::get('/pais/nuevo',[PaisController::class, 'nuevo']);
Route::get('/pais/{npais}',[PaisController::class, 'paisinfo']);

Route::get('/home', function() {
    return redirect('/');
});

Route::get('/listado', function() {
    return view('listado', ['paisos' => array('França','Espanya','Argentina')]);
});

Route::get('/info', function() {
    return view('info');
});

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return redirect('/');
// });
// Route::get('/listado', function () {
//     return view('listado', ['paisos' => array('França','Espanya','Argentina')]);
// });
// Route::get('/info', function () {
//     return view('info');
// });
// Route::get('/pais/nuevo', function () {
//     return view('nuevo');
// });
// Route::post('/pais', function (Request $request) {
//     $request->density=$request->habitants/$request->superficie;
//     return view('vernuevo', ['request' => $request]);
// });
// Route::get('/pais/{npais}', function ($npais) {
//     return view('info',['npais' => $npais]);
// });
