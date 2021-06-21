<?php

use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\BarcoController;
use App\Http\Controllers\CasaController;
use App\Http\Controllers\ConvidadoController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\PernoiteController;
use App\Http\Controllers\PropriedadeController;
use App\Http\Controllers\ReembolsoController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\TransladoController;
use App\Http\Controllers\ViagemController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // rota de viagens
    Route::delete('viagens/{id}', [ViagemController::class, 'destroy'])->name('viagens.destroy');
    Route::post('viagens', [ViagemController::class, 'store'])->name('viagens.enviar');
    Route::get('viagens/criar', [ViagemController::class, 'create'])->name('viagens.criar');
    Route::get('viagens', [ViagemController::class, 'index'])->name('viagens.index');
    // rota de avaliacoes EMAILS
    Route::post('avaliacao/enviar_link', [AvaliacaoController::class, 'enviarLink'])->name('avaliacao.enviar_link');
    Route::post('avaliacao/disparar_casa', [AvaliacaoController::class, 'dispararCasa'])->name('avaliacao.disparar_casa');
    Route::post('avaliacao/disparar_barco', [AvaliacaoController::class, 'dispararBarco'])->name('avaliacao.disparar_barco');
    // rota de avaliacoes
    Route::delete('avaliacoes/{id}', [AvaliacaoController::class, 'destroy'])->name('avaliacoes.destroy');
    Route::post('avaliacoes', [AvaliacaoController::class, 'store'])->name('avaliacoes.enviar');
    Route::get('avaliacoes/geral/{id}', [AvaliacaoController::class, 'geral'])->name('avaliacoes.geral');
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
    Route::delete('reembolsos/{id}', [ReembolsoController::class, 'destroy'])->name('reembolso.destroy');
    Route::post('reembolsos', [ReembolsoController::class, 'store'])->name('reembolsos.enviar');
    Route::get('reembolsos/criar', [ReembolsoController::class, 'create'])->name('reembolsos.criar');
    Route::get('reembolsos', [ReembolsoController::class, 'index'])->name('reembolsos.index');
    // rota de pernoite
    Route::delete('pernoites/{id}', [PernoiteController::class, 'destroy'])->name('pernoites.destroy');
    Route::post('pernoites', [PernoiteController::class, 'store'])->name('pernoites.enviar');
    Route::get('pernoites/criar', [PernoiteController::class, 'create'])->name('pernoites.criar');
    Route::get('pernoites', [PernoiteController::class, 'index'])->name('pernoites.index');
    // rota de translado
    Route::delete('translados/{id}', [TransladoController::class, 'destroy'])->name('translados.destroy');
    Route::post('translados', [TransladoController::class, 'store'])->name('translados.enviar');
    Route::get('translados/criar', [TransladoController::class, 'create'])->name('translados.criar');
    Route::get('translados', [TransladoController::class, 'index'])->name('translados.index');
    // rota de convidado
    Route::post('convidados', [ConvidadoController::class, 'store'])->name('convidados.enviar');
    Route::get('convidados/criar', [ConvidadoController::class, 'create'])->name('convidados.criar');
    Route::get('convidados', [ConvidadoController::class, 'index'])->name('convidados.index');

    // Emails
    Route::delete('emails/{id}', [EmailsController::class, 'destroy'])->name('emails.destroy');
    Route::post('emails', [EmailsController::class, 'store'])->name('emails.enviar');
    Route::get('emails', [EmailsController::class, 'index'])->name('emails.index');

    //rota de registro de usuário
    Route::get('registar', function () {
        return view('auth.register');
    })->name('registrar');
});

// rota inicial
Route::get('/', function () {
    return view('auth.login');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
