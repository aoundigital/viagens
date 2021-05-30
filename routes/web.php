<?php

use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\BarcoController;
use App\Http\Controllers\CasaController;
use App\Http\Controllers\ConvidadoController;
use App\Http\Controllers\PernoiteController;
use App\Http\Controllers\PropriedadeController;
use App\Http\Controllers\ReembolsoController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\TransladoController;
use App\Http\Controllers\ViagemController;
use Illuminate\Support\Facades\Route;

// rota de viagens
Route::post('viagens', [ViagemController::class, 'store'])->name('viagens.enviar');
Route::get('viagens/criar', [ViagemController::class, 'create'])->name('viagens.criar');
Route::get('viagens', [ViagemController::class, 'index'])->name('viagens.index');
// rota de avaliacoes
Route::post('avaliacoes', [AvaliacaoController::class, 'store'])->name('avaliacoes.enviar');
Route::get('avaliacoes/criar', [AvaliacaoController::class, 'create'])->name('avaliacoes.criar');
Route::get('avaliacoes', [AvaliacaoController::class, 'index'])->name('avaliacoes.index');
// rota de casa
Route::get('casas', [CasaController::class, 'index'])->name('casas.index');
// rota de barco
Route::get('barcos', [BarcoController::class, 'index'])->name('barcos.index');
// rota de propriedades
Route::get('propriedades', [PropriedadeController::class, 'index'])->name('propriedades.index');
// rota de sócios
Route::get('socios', [SocioController::class, 'index'])->name('socios.index');
// rota de reembolso
Route::post('reembolsos', [ReembolsoController::class, 'store'])->name('reembolsos.enviar');
Route::get('reembolsos/criar', [ReembolsoController::class, 'create'])->name('reembolsos.criar');
Route::get('reembolsos', [ReembolsoController::class, 'index'])->name('reembolsos.index');
// rota de pernoite
Route::post('pernoites', [PernoiteController::class, 'store'])->name('pernoites.enviar');
Route::get('pernoites/criar', [PernoiteController::class, 'create'])->name('pernoites.criar');
Route::get('pernoites', [PernoiteController::class, 'index'])->name('pernoites.index');
// rota de translado
Route::post('translados', [TransladoController::class, 'store'])->name('translados.enviar');
Route::get('translados/criar', [TransladoController::class, 'create'])->name('translados.criar');
Route::get('translados', [TransladoController::class, 'index'])->name('translados.index');
// rota de convidado
Route::post('convidados', [ConvidadoController::class, 'store'])->name('convidados.enviar');
Route::get('convidados/criar', [ConvidadoController::class, 'create'])->name('convidados.criar');
Route::get('convidados', [ConvidadoController::class, 'index'])->name('convidados.index');
// rota inicial
Route::get('/', function () {return view('welcome');});
