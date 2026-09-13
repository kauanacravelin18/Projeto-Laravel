@extends('layouts.app')

@section('title', 'Registrar movimentação')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Registrar movimentação</h1>

    <form action="{{ route('movimentacoes.store') }}" method="POST" class="bg-white rounded-lg shadow-sm p-6 space-y-4 max-w-xl">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1">Item</label>
            <select name="item_id" class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200" required>
                <option value="">Selecione...</option>
                @foreach ($itens as $item)
                    <option value="{{ $item->id }}" @selected(old('item_id', $itemSelecionado) == $item->id)>
                        {{ $item->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Tipo</label>
            <select name="tipo" id="tipo" class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200" required>
                <option value="entrada" @selected(old('tipo') === 'entrada')>Entrada</option>
                <option value="saida" @selected(old('tipo') === 'saida')>Saída</option>
                <option value="transferencia" @selected(old('tipo') === 'transferencia')>Transferência</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Quantidade</label>
            <input type="number" name="quantidade" min="1" value="{{ old('quantidade', 1) }}"
                class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200" required>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Local de origem</label>
                <select name="local_origem_id" class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200">
                    <option value="">—</option>
                    @foreach ($locais as $local)
                        <option value="{{ $local->id }}" @selected(old('local_origem_id') == $local->id)>{{ $local->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Local de destino</label>
                <select name="local_destino_id" class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200">
                    <option value="">—</option>
                    @foreach ($locais as $local)
                        <option value="{{ $local->id }}" @selected(old('local_destino_id') == $local->id)>{{ $local->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Observação</label>
            <textarea name="observacao" rows="3"
                class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200">{{ old('observacao') }}</textarea>
        </div>

        <p class="text-xs text-gray-500">
            Entrada soma a quantidade ao item, saída subtrai, e transferência move o item para o local de destino.
        </p>

        <div class="flex justify-end gap-3 pt-2">
            <a href="{{ route('movimentacoes.index') }}" class="px-4 py-2 rounded-md text-sm border border-gray-300 hover:bg-gray-50">Cancelar</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700">Registrar</button>
        </div>
    </form>
@endsection
