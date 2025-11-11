<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\ServicoController;

Route::resource('clientes', ClienteController::class);
Route::resource('servicos', ServicoController::class);
Route::resource('agendamentos', AgendamentoController::class);
Route::resource('pagamentos', PagamentoController::class);

Route::get('/', function () {
    return view('welcome');
});
