@extends('layouts.app')

@section('title', 'Registrar movimentação')

@section('content')

    {{-- Cabeçalho --}}
    <div class="text-center mb-8">

        <h1 class="text-4xl font-extrabold tracking-wide text-slate-800">
            REGISTRAR MOVIMENTAÇÃO
        </h1>

        <p class="mt-2 text-base text-slate-500">
            Registre uma entrada, saída ou transferência de item
        </p>

    </div>


    {{-- Formulário --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm
                overflow-hidden max-w-3xl mx-auto">

        {{-- Cabeçalho do formulário --}}
        <div class="px-6 py-5 border-b border-slate-200 text-center">

            <h2 class="text-xl font-bold tracking-wide text-slate-800">
                Dados da movimentação
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Preencha as informações abaixo para registrar a movimentação.
            </p>

        </div>


        <form action="{{ route('movimentacoes.store') }}"
              method="POST"
              class="p-6">

            @csrf

            <div class="space-y-5">

                {{-- Item --}}
                <div>
                    <label for="item_id"
                           class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Item
                    </label>

                    <select name="item_id"
                            id="item_id"
                            class="w-full rounded-lg border-slate-300
                                   focus:border-blue-500 focus:ring-blue-500
                                   text-sm"
                            required>

                        <option value="">Selecione o item...</option>

                        @foreach ($itens as $item)

                            <option value="{{ $item->id }}"
                                @selected(old('item_id', $itemSelecionado) == $item->id)>
                                {{ $item->nome }}
                            </option>

                        @endforeach

                    </select>
                </div>


                {{-- Tipo --}}
                <div>
                    <label for="tipo"
                           class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Tipo de movimentação
                    </label>

                    <select name="tipo"
                            id="tipo"
                            class="w-full rounded-lg border-slate-300
                                   focus:border-blue-500 focus:ring-blue-500
                                   text-sm"
                            required>

                        <option value="entrada"
                            @selected(old('tipo') === 'entrada')}>
                            Entrada
                        </option>

                        <option value="saida"
                            @selected(old('tipo') === 'saida')}>
                            Saída
                        </option>

                        <option value="transferencia"
                            @selected(old('tipo') === 'transferencia')}>
                            Transferência
                        </option>

                    </select>

                    <p class="mt-1.5 text-xs text-slate-500">
                        Escolha o tipo de movimentação que será registrada.
                    </p>
                </div>


                {{-- Quantidade --}}
                <div>
                    <label for="quantidade"
                           class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Quantidade
                    </label>

                    <input type="number"
                           name="quantidade"
                           id="quantidade"
                           min="1"
                           value="{{ old('quantidade', 1) }}"
                           class="w-full rounded-lg border-slate-300
                                  focus:border-blue-500 focus:ring-blue-500
                                  text-sm"
                           required>
                </div>


                {{-- Locais --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                    {{-- Origem --}}
                    <div>
                        <label for="local_origem_id"
                               class="block text-sm font-semibold text-slate-700 mb-1.5">
                            Local de origem
                        </label>

                        <select name="local_origem_id"
                                id="local_origem_id"
                                class="w-full rounded-lg border-slate-300
                                       focus:border-blue-500 focus:ring-blue-500
                                       text-sm">

                            <option value="">Selecione...</option>

                            @foreach ($locais as $local)

                                <option value="{{ $local->id }}"
                                    @selected(old('local_origem_id') == $local->id)>
                                    {{ $local->nome }}
                                </option>

                            @endforeach

                        </select>
                    </div>


                    {{-- Destino --}}
                    <div>
                        <label for="local_destino_id"
                               class="block text-sm font-semibold text-slate-700 mb-1.5">
                            Local de destino
                        </label>

                        <select name="local_destino_id"
                                id="local_destino_id"
                                class="w-full rounded-lg border-slate-300
                                       focus:border-blue-500 focus:ring-blue-500
                                       text-sm">

                            <option value="">Selecione...</option>

                            @foreach ($locais as $local)

                                <option value="{{ $local->id }}"
                                    @selected(old('local_destino_id') == $local->id)>
                                    {{ $local->nome }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                </div>


                {{-- Observação --}}
                <div>
                    <label for="observacao"
                           class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Observação
                    </label>

                    <textarea name="observacao"
                              id="observacao"
                              rows="4"
                              class="w-full rounded-lg border-slate-300
                                     focus:border-blue-500 focus:ring-blue-500
                                     text-sm"
                              placeholder="Adicione uma observação, se necessário...">{{ old('observacao') }}</textarea>
                </div>


                {{-- Informação --}}
                <div class="rounded-lg bg-slate-50 border border-slate-200 p-4">

                    <p class="text-sm text-slate-600">
                        <span class="font-semibold text-slate-700">
                            Como funciona:
                        </span>

                        Entrada adiciona a quantidade ao item, saída reduz a quantidade
                        e transferência move o item para o local de destino.
                    </p>

                </div>

            </div>


            {{-- Botões --}}
            <div class="flex justify-between items-center gap-3
                        pt-6 mt-6 border-t border-slate-100">

                {{-- Cancelar --}}
                <a href="{{ route('movimentacoes.index') }}"
                   class="inline-flex items-center gap-2
                          px-4 py-2.5 rounded-lg
                          text-sm font-semibold
                          text-slate-600
                          border border-slate-300
                          hover:bg-slate-50
                          transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.8"
                         stroke="currentColor"
                         class="w-4 h-4">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15.75 19.5L8.25 12l7.5-7.5" />

                    </svg>

                    CANCELAR

                </a>


                {{-- Registrar --}}
                <button type="submit"
                        class="inline-flex items-center gap-2
                               bg-slate-900 hover:bg-slate-800
                               text-white px-5 py-2.5 rounded-lg
                               text-sm font-semibold
                               shadow-sm transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="2"
                         stroke="currentColor"
                         class="w-5 h-5">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M4.5 12.75l6 6 9-13.5" />

                    </svg>

                    REGISTRAR MOVIMENTAÇÃO

                </button>

            </div>

        </form>

    </div>

@endsection