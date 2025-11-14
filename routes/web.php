<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function (Request $request) {

    if ($request->user()->role === 'admin') {
        return redirect()->route('clientes.index');
    }

    return view('dashboard');
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('clientes', ClienteController::class);
    Route::resource('servicos', ServicoController::class);
    Route::resource('agendamentos', AgendamentoController::class);
    Route::resource('pagamentos', PagamentoController::class);
});

require __DIR__.'/auth.php';

