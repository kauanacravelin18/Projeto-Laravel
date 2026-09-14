<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Local;
use App\Models\Movimentacao;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StoreMovimentacaoRequest;

class MovimentacaoController extends Controller
{
    public function index(Request $request): View
    {
        $movimentacoes = Movimentacao::with(['item', 'localOrigem', 'localDestino', 'usuario'])
            ->when($request->filled('item_id'), fn ($query) => $query->where('item_id', $request->item_id))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('movimentacoes.index', compact('movimentacoes'));
    }

    public function create(Request $request): View
    {
        $this->authorize('create', Movimentacao::class);

        return view('movimentacoes.create', [
            'itens' => Item::orderBy('nome')->get(),
            'locais' => Local::orderBy('nome')->get(),
            'itemSelecionado' => $request->integer('item_id'),
        ]);
    }

    public function store(StoreMovimentacaoRequest $request): RedirectResponse
    {

        $this->authorize('create', Movimentacao::class);

        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        $movimentacao = Movimentacao::create($validated);

        $this->aplicarEfeitoNoItem($movimentacao);

        return redirect()
            ->route('movimentacoes.index')
            ->with('success', 'Movimentação registrada com sucesso.');
    }

    public function destroy(Movimentacao $movimentacao): RedirectResponse
    {
        $this->authorize('delete', $movimentacao);


        $movimentacao->delete();

        return redirect()->route('movimentacoes.index')->with('success', 'Movimentação removida com sucesso.');
    }

    /**
     * Aplica o efeito da movimentação sobre o estoque/local do item.
     * Entrada soma quantidade, saída subtrai, transferência move o item de local.
     */
    private function aplicarEfeitoNoItem(Movimentacao $movimentacao): void
    {
        $item = $movimentacao->item;

        match ($movimentacao->tipo) {
            'entrada' => $item->increment('quantidade', $movimentacao->quantidade),
            'saida' => $item->decrement('quantidade', min($movimentacao->quantidade, $item->quantidade)),
            'transferencia' => $movimentacao->local_destino_id
                ? $item->update(['local_id' => $movimentacao->local_destino_id])
                : null,
            default => null,
        };
    }
}