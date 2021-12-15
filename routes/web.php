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

use App\Http\Controllers\MisNombresController;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('prueba/{nombre}/{apellido}', [ MisNombresController::class,'mostrarNombres' ] );

// Route::get('todo', [ TodoController::class, 'index' ]);

Route::resource('todo', TodoController::class);

Route::get('todo/listo/{todo}',[ TodoController::class,'tareaLista' ])->name('listo');

