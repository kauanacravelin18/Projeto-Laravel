<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Item;
use App\Models\Local;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function index(Request $request): View
    {
        $itens = Item::with(['categoria', 'local'])
            ->when($request->filled('busca'), fn ($query) => $query->where('nome', 'like', '%' . $request->busca . '%'))
            ->when($request->filled('status'), fn ($query) => $query->where('status', $request->status))
            ->orderBy('nome')
            ->paginate(10)
            ->withQueryString();

        return view('itens.index', compact('itens'));
    }

    public function create(): View
    {
        return view('itens.create', [
            'categorias' => Categoria::orderBy('nome')->get(),
            'locais' => Local::orderBy('nome')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Item::create($this->validarDados($request));

        return redirect()->route('itens.index')->with('success', 'Item cadastrado com sucesso.');
    }

    public function show(Item $item): View
    {
        $item->load(['categoria', 'local', 'movimentacoes.localOrigem', 'movimentacoes.localDestino']);

        return view('itens.show', compact('item'));
    }

    public function edit(Item $item): View
    {
        return view('itens.edit', [
            'item' => $item,
            'categorias' => Categoria::orderBy('nome')->get(),
            'locais' => Local::orderBy('nome')->get(),
        ]);
    }

    public function update(Request $request, Item $item): RedirectResponse
    {
        $item->update($this->validarDados($request));

        return redirect()->route('itens.index')->with('success', 'Item atualizado com sucesso.');
    }

    public function destroy(Item $item): RedirectResponse
    {
        $item->delete();

        return redirect()->route('itens.index')->with('success', 'Item removido com sucesso.');
    }

    private function validarDados(Request $request): array
    {
        return $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'categoria_id' => 'required|exists:categorias,id',
            'local_id' => 'required|exists:locais,id',
            'quantidade' => 'required|integer|min:0',
            'status' => 'required|in:disponivel,em_uso,manutencao,baixado',
        ]);
    }
}