@extends('layouts.app')

@section('title', 'Itens')

@php
    $badges = [
        'disponivel' => 'bg-green-100 text-green-700',
        'em_uso' => 'bg-blue-100 text-blue-700',
        'manutencao' => 'bg-amber-100 text-amber-700',
        'baixado' => 'bg-gray-200 text-gray-600',
    ];
    $rotulos = [
        'disponivel' => 'Disponível',
        'em_uso' => 'Em uso',
        'manutencao' => 'Manutenção',
        'baixado' => 'Baixado',
    ];
@endphp

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Itens</h1>
        <a href="{{ route('itens.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700">
            + Novo item
        </a>
    </div>

    <form method="GET" class="bg-white rounded-lg shadow-sm p-4 mb-4 flex flex-wrap gap-3 items-end">
        <div>
            <label class="block text-xs font-medium mb-1 text-gray-600">Buscar por nome</label>
            <input type="text" name="busca" value="{{ request('busca') }}" placeholder="Ex: cadeira"
                class="rounded-md border-gray-300 text-sm focus:border-blue-400 focus:ring focus:ring-blue-200">
        </div>
        <div>
            <label class="block text-xs font-medium mb-1 text-gray-600">Status</label>
            <select name="status" class="rounded-md border-gray-300 text-sm focus:border-blue-400 focus:ring focus:ring-blue-200">
                <option value="">Todos</option>
                @foreach ($rotulos as $valor => $rotulo)
                    <option value="{{ $valor }}" @selected(request('status') === $valor)>{{ $rotulo }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-900">Filtrar</button>
        @if (request('busca') || request('status'))
            <a href="{{ route('itens.index') }}" class="text-sm text-gray-500 hover:underline">Limpar</a>
        @endif
    </form>

    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">Nome</th>
                    <th class="px-4 py-3">Categoria</th>
                    <th class="px-4 py-3">Local</th>
                    <th class="px-4 py-3">Qtd.</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 text-right">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($itens as $item)
                    <tr>
                        <td class="px-4 py-3 font-medium">
                            <a href="{{ route('itens.show', $item) }}" class="hover:underline">{{ $item->nome }}</a>
                        </td>
                        <td class="px-4 py-3 text-gray-500">{{ $item->categoria->nome }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $item->local->nome }}</td>
                        <td class="px-4 py-3">{{ $item->quantidade }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs {{ $badges[$item->status] }}">
                                {{ $rotulos[$item->status] }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('itens.edit', $item) }}" class="text-blue-600 hover:underline">Editar</a>
                            <form action="{{ route('itens.destroy', $item) }}" method="POST" class="inline"
                                onsubmit="return confirm('Remover este item?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-400">Nenhum item encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $itens->links() }}
    </div>
@endsection
