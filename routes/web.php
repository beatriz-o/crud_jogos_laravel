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
use App\Http\Controllers\JogoController;

Route::get('/', [JogoController::class, 'index']);
Route::get('/jogos/criar', [JogoController::class, 'criar'])->middleware('auth');//middleware('auth') para permitir somente para os usuarios logados criarem jogos
Route::get('/jogos/{id}', [JogoController::class, 'mostrar']);//show

//rota de post
Route::post('/jogos', [JogoController::class, 'store']);//store envia dodos pro banco

Route::delete('/jogos/{id}', [JogoController::class, 'destroy'])->middleware('auth');

Route::get('/jogos/editar/{id}', [JogoController::class, 'editar'])->middleware('auth');
Route::put('/jogos/update/{id}', [JogoController::class, 'update'])->middleware('auth');;

Route::get('/contato', [JogoController::class, 'contato']);

Route::get('/dashboard',[JogoController::class, 'dashboard'])->middleware('auth');

Route::get('/jogos/join/{id}', [JogoController::class, 'joinJogo'])->middleware('auth');

Route::delete('/jogos/leave/{id}', [JogoController::class, 'leaveJogo'])->middleware('auth');


