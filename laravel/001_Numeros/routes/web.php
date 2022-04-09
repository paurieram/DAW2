<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\AnalisiController;

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

Route::get('/calculadora',[CalculadoraController::class, 'calc']);
Route::post('/calculadora/suma',[CalculadoraController::class, 'suma']);
Route::post('/calculadora/resta',[CalculadoraController::class, 'resta']);
Route::post('/calculadora/multiplicacion',[CalculadoraController::class, 'multi']);
Route::post('/calculadora/division',[CalculadoraController::class, 'divi']);

Route::get('/analisis',[AnalisiController::class, 'analisisg']);
Route::post('/analisis',[AnalisiController::class, 'analisisp']);

Route::get('/', function () {
    return redirect('/traductor/es');
});
Route::get('/traductor/{lang}', function ($lang) {
    $formatter = new NumberFormatter($lang, NumberFormatter::SPELLOUT);
    $num = [];
    for ($i=0; $i <= 100; $i++) { 
        $num[$i] = $formatter->format($i);
    }
    return view('traductor', ['num' => $num]);
});
