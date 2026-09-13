<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\MovimentacaoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('itens.index');
});

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Categorias
    |--------------------------------------------------------------------------
    | Apenas administrador e gerente podem gerenciar categorias.
    */
    Route::resource('categorias', CategoriaController::class)
        ->except('show')
        ->middleware('role:admin,gerente');


    /*
    |--------------------------------------------------------------------------
    | Locais
    |--------------------------------------------------------------------------
    | Apenas administrador e gerente podem gerenciar locais.
    */
    Route::resource('locais', LocalController::class)
        ->except('show')
        ->middleware('role:admin,gerente');


    /*
    |--------------------------------------------------------------------------
    | Itens
    |--------------------------------------------------------------------------
    | Todos os usuários autenticados podem consultar.
    | Apenas administrador e gerente podem cadastrar/editar.
    */
    Route::resource('itens', ItemController::class)
        ->only(['index', 'show']);

    Route::resource('itens', ItemController::class)
        ->only(['create', 'store', 'edit', 'update'])
        ->middleware('role:admin,gerente');

    /*
    |--------------------------------------------------------------------------
    | Exclusão de itens
    |--------------------------------------------------------------------------
    | Somente administrador pode excluir.
    */
    Route::delete('itens/{item}', [ItemController::class, 'destroy'])
        ->name('itens.destroy')
        ->middleware('role:admin');


    /*
    |--------------------------------------------------------------------------
    | Movimentações
    |--------------------------------------------------------------------------
    | Todos podem consultar o histórico.
    | Admin e gerente podem registrar movimentações.
    | A exclusão será protegida pela MovimentacaoPolicy.
    */
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