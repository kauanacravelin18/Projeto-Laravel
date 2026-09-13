<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\MovimentacaoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('itens.index');
});

Route::resource('categorias', CategoriaController::class)->except('show');
Route::resource('locais', LocalController::class)->except('show');
Route::resource('itens', ItemController::class);
Route::resource('movimentacoes', MovimentacaoController::class)->only(['index', 'create', 'store', 'destroy']);