<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LocalController extends Controller
{
    public function index(): View
    {
        $locais = Local::withCount('itens')->orderBy('nome')->paginate(10);

        return view('locais.index', compact('locais'));
    }

    public function create(): View
    {
        return view('locais.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Local::create($this->validarDados($request));

        return redirect()->route('locais.index')
            ->with('success', 'Local cadastrado com sucesso.');
    }

    public function edit(Local $local): View
    {
        return view('locais.edit', compact('local'));
    }

    public function update(Request $request, Local $local): RedirectResponse
    {
        $local->update($this->validarDados($request));

        return redirect()->route('locais.index')
            ->with('success', 'Local atualizado com sucesso.');
    }

    public function destroy(Local $local): RedirectResponse
    {
        if ($local->itens()->exists()) {
            return redirect()->route('locais.index')
                ->with('error', 'Não é possível excluir: existem itens vinculados a este local.');
        }

        $local->delete();

        return redirect()->route('locais.index')
            ->with('success', 'Local removido com sucesso.');
    }

    private function validarDados(Request $request): array
    {
        return $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
        ]);
    }
}