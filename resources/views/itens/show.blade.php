@extends('layouts.app')

@section('title', $item->nome)

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold">{{ $item->nome }}</h1>
            <p class="text-sm text-gray-500">{{ $item->categoria->nome }} · {{ $item->local->nome }}</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('movimentacoes.create', ['item_id' => $item->id]) }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700">Registrar movimentação</a>
            <a href="{{ route('itens.edit', $item) }}"
                class="border border-gray-300 px-4 py-2 rounded-md text-sm hover:bg-gray-50">Editar</a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6 mb-6 grid grid-cols-2 sm:grid-cols-4 gap-4 text-sm">
        <div>
            <p class="text-gray-500">Quantidade atual</p>
            <p class="font-semibold text-lg">{{ $item->quantidade }}</p>
        </div>
        <div>
            <p class="text-gray-500">Status</p>
            <p class="font-semibold text-lg">{{ ucfirst(str_replace('_', ' ', $item->status)) }}</p>
        </div>
        <div class="col-span-2">
            <p class="text-gray-500">Descrição</p>
            <p>{{ $item->descricao ?? '—' }}</p>
        </div>
    </div>

    <h2 class="text-lg font-semibold mb-3">Histórico de movimentações</h2>
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">Data</th>
                    <th class="px-4 py-3">Tipo</th>
                    <th class="px-4 py-3">Qtd.</th>
                    <th class="px-4 py-3">De</th>
                    <th class="px-4 py-3">Para</th>
                    <th class="px-4 py-3">Observação</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($item->movimentacoes as $mov)
                    <tr>
                        <td class="px-4 py-3">{{ $mov->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3 capitalize">{{ $mov->tipo }}</td>
                        <td class="px-4 py-3">{{ $mov->quantidade }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $mov->localOrigem->nome ?? '—' }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $mov->localDestino->nome ?? '—' }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $mov->observacao ?? '—' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-400">Nenhuma movimentação registrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <a href="{{ route('itens.index') }}" class="text-sm text-gray-500 hover:underline">&larr; Voltar para itens</a>
    </div>
@endsection
