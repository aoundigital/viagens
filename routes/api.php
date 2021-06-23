<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('barcos', \App\Http\Controllers\BarcoController::class);
Route::resource('casa', \App\Http\Controllers\CasaController::class);

// rota de casa
Route::post('casas' , [\App\Http\Controllers\CasaController::class, 'create']);
Route::get('casas', [\App\Http\Controllers\CasaController::class, 'index']);

// rota de barco
Route::post('barcos', [\App\Http\Controllers\BarcoController::class, 'create']);
Route::get('barcos', [\App\Http\Controllers\BarcoController::class, 'index']);

//verificar a avaliação
Route::get('avalia-casa/{id}', [\App\Http\Controllers\AvaliacaoController::class, 'avaliaCasa']);
