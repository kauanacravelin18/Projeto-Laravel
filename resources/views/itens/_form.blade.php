@php
    $rotulos = [
        'disponivel' => 'Disponível',
        'em_uso' => 'Em uso',
        'manutencao' => 'Manutenção',
        'baixado' => 'Baixado',
    ];
@endphp

<div>
    <label class="block text-sm font-medium mb-1">Nome</label>
    <input
        type="text"
        name="nome"
        value="{{ old('nome', $item->nome ?? '') }}"
        class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200"
        required
        autofocus
    >
</div>

<div>
    <label class="block text-sm font-medium mb-1">Descrição</label>
    <textarea
        name="descricao"
        rows="3"
        class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200"
    >{{ old('descricao', $item->descricao ?? '') }}</textarea>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Categoria</label>

        <select
            name="categoria_id"
            class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200"
            required
        >
            <option value="">Selecione...</option>

            @foreach ($categorias as $categoria)
                <option
                    value="{{ $categoria->id }}"
                    @selected(old('categoria_id', $item->categoria_id ?? '') == $categoria->id)
                >
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Local</label>

        <select
            name="local_id"
            class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200"
            required
        >
            <option value="">Selecione...</option>

            @foreach ($locais as $local)
                <option
                    value="{{ $local->id }}"
                    @selected(old('local_id', $item->local_id ?? '') == $local->id)
                >
                    {{ $local->nome }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Quantidade</label>

        <input
            type="number"
            name="quantidade"
            min="0"
            value="{{ old('quantidade', $item->quantidade ?? 0) }}"
            class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200"
            required
        >
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Status</label>

        <select
            name="status"
            class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200"
            required
        >
            @foreach ($rotulos as $valor => $rotulo)
                <option
                    value="{{ $valor }}"
                    @selected(old('status', $item->status ?? 'disponivel') === $valor)
                >
                    {{ $rotulo }}
                </option>
            @endforeach
        </select>
    </div>
</div>