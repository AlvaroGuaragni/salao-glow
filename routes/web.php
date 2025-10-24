<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendamentoControllert;
use App\Http\Controllers\ClienteControllert;
use App\Http\Controllers\PagamentoControllert;
use App\Http\Controllers\ServicoControllert;

Route::get('/', function () {
    Route::resource('clientes', ClienteControllert::class);
    Route::resource('servicos', ServicoControllert::class); 
    Route::resource('agendamentos', AgendamentoControllert::class);
    Route::resource('pagamentos', PagamentoControllert::class);
});
