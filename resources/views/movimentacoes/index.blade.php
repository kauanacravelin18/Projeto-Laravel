@extends('layouts.app')

@section('title', 'Movimentações')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Movimentações</h1>
        <a href="{{ route('movimentacoes.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700">
            + Registrar movimentação
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">Data</th>
                    <th class="px-4 py-3">Item</th>
                    <th class="px-4 py-3">Tipo</th>
                    <th class="px-4 py-3">Qtd.</th>
                    <th class="px-4 py-3">De</th>
                    <th class="px-4 py-3">Para</th>
                    <th class="px-4 py-3">Usuário</th>
                    <th class="px-4 py-3 text-right">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($movimentacoes as $mov)
                    <tr>
                        <td class="px-4 py-3 text-gray-500">{{ $mov->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3 font-medium">
                            <a href="{{ route('itens.show', $mov->item) }}" class="hover:underline">{{ $mov->item->nome }}</a>
                        </td>
                        <td class="px-4 py-3 capitalize">{{ $mov->tipo }}</td>
                        <td class="px-4 py-3">{{ $mov->quantidade }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $mov->localOrigem->nome ?? '—' }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $mov->localDestino->nome ?? '—' }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $mov->usuario->name ?? '—' }}</td>
                        <td class="px-4 py-3 text-right">
                            <form action="{{ route('movimentacoes.destroy', $mov) }}" method="POST" class="inline"
                                onsubmit="return confirm('Remover esta movimentação?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-6 text-center text-gray-400">Nenhuma movimentação registrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $movimentacoes->links() }}
    </div>
@endsection
