@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Categorias</h1>
        <a href="{{ route('categorias.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700">
            + Nova categoria
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">Nome</th>
                    <th class="px-4 py-3">Descrição</th>
                    <th class="px-4 py-3">Itens</th>
                    <th class="px-4 py-3 text-right">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($categorias as $categoria)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $categoria->nome }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $categoria->descricao ?? '—' }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $categoria->itens_count }}</td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('categorias.edit', $categoria) }}" class="text-blue-600 hover:underline">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" class="inline"
                                onsubmit="return confirm('Remover esta categoria?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-400">Nenhuma categoria cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $categorias->links() }}
    </div>
@endsection
