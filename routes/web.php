<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\MovimentacaoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    Route::resource('categorias', CategoriaController::class)
        ->except('show')
        ->middleware('role:admin,gerente');


    Route::resource('locais', LocalController::class)
        ->parameters(['locais' => 'local'])
        ->except('show')
        ->middleware('role:admin,gerente');

    Route::resource('itens', ItemController::class)
        ->parameters(['itens' => 'item'])
        ->only(['index', 'show']);

    Route::resource('itens', ItemController::class)
        ->parameters(['itens' => 'item'])
        ->only(['create', 'store', 'edit', 'update'])
        ->middleware('role:admin,gerente');


    Route::delete('itens/{item}', [ItemController::class, 'destroy'])
        ->name('itens.destroy')
        ->middleware('role:admin');


    Route::resource('movimentacoes', MovimentacaoController::class)
        ->only(['index']);


    Route::resource('movimentacoes', MovimentacaoController::class)
        ->only(['create', 'store'])
        ->middleware('role:admin,gerente');


    Route::delete(
        'movimentacoes/{movimentacao}',
        [MovimentacaoController::class, 'destroy']
    )->name('movimentacoes.destroy');
});

require __DIR__.'/auth.php';