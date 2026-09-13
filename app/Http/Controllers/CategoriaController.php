<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    public function index(): View
    {
        $categorias = Categoria::withCount('itens')->orderBy('nome')->paginate(10);

        return view('categorias.index', compact('categorias'));
    }

    public function create(): View
    {
        return view('categorias.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Categoria::create($this->validarDados($request));

        return redirect()->route('categorias.index')->with('success', 'Categoria cadastrada com sucesso.');
    }

    public function edit(Categoria $categoria): View
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria): RedirectResponse
    {
        $categoria->update($this->validarDados($request));

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso.');
    }

    public function destroy(Categoria $categoria): RedirectResponse
    {
        if ($categoria->itens()->exists()) {
            return redirect()->route('categorias.index')
                ->with('error', 'Não é possível excluir: existem itens vinculados a esta categoria.');
        }

        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria removida com sucesso.');
    }

    private function validarDados(Request $request): array
    {
        return $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
        ]);
    }
}