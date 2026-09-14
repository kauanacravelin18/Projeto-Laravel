@extends('layouts.app')

@section('title', $item->nome)

@section('content')

    {{-- Cabeçalho --}}
    <div class="mb-8">

        <div class="flex items-start justify-between gap-4 flex-wrap">

            <div>
                <h1 class="text-4xl font-extrabold tracking-wide text-slate-800">
                    {{ $item->nome }}
                </h1>

                <p class="mt-2 text-base text-slate-500">
                    {{ $item->categoria->nome }}
                    <span class="mx-1">•</span>
                    {{ $item->local->nome }}
                </p>
            </div>


            {{-- Ações --}}
            <div class="flex items-center gap-2 flex-wrap">

                <a href="{{ route('movimentacoes.create', ['item_id' => $item->id]) }}"
                   class="inline-flex items-center gap-2
                          bg-slate-900 hover:bg-slate-800
                          text-white px-4 py-2.5 rounded-lg
                          text-sm font-semibold shadow-sm transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.8"
                         stroke="currentColor"
                         class="w-5 h-5">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 4.5v15m7.5-7.5h-15" />

                    </svg>

                    REGISTRAR MOVIMENTAÇÃO
                </a>


                <a href="{{ route('itens.edit', $item) }}"
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
                         class="w-5 h-5">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897L16.862 4.487z" />

                    </svg>

                    EDITAR
                </a>

            </div>

        </div>

    </div>


    {{-- Informações do item --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm
                overflow-hidden mb-8">

        <div class="px-6 py-5 border-b border-slate-200">

            <h2 class="text-xl font-bold tracking-wide text-slate-800">
                Informações do item
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Confira os dados e a situação atual do item.
            </p>

        </div>


        <div class="p-6">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

                {{-- Quantidade --}}
                <div class="rounded-lg bg-slate-50 border border-slate-200 p-5">

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Quantidade atual
                    </p>

                    <p class="mt-2 text-3xl font-bold text-slate-800">
                        {{ $item->quantidade }}
                    </p>

                </div>


                {{-- Status --}}
                <div class="rounded-lg bg-slate-50 border border-slate-200 p-5">

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Status
                    </p>

                    <p class="mt-2 text-lg font-bold text-slate-800">
                        {{ ucfirst(str_replace('_', ' ', $item->status)) }}
                    </p>

                </div>


                {{-- Categoria --}}
                <div class="rounded-lg bg-slate-50 border border-slate-200 p-5">

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Categoria
                    </p>

                    <p class="mt-2 text-lg font-bold text-slate-800">
                        {{ $item->categoria->nome }}
                    </p>

                </div>


                {{-- Local --}}
                <div class="rounded-lg bg-slate-50 border border-slate-200 p-5">

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Local atual
                    </p>

                    <p class="mt-2 text-lg font-bold text-slate-800">
                        {{ $item->local->nome }}
                    </p>

                </div>

            </div>


            {{-- Descrição --}}
            <div class="mt-5 rounded-lg bg-slate-50 border border-slate-200 p-5">

                <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                    Descrição
                </p>

                <p class="mt-2 text-sm text-slate-700">
                    {{ $item->descricao ?? 'Nenhuma descrição informada.' }}
                </p>

            </div>

        </div>

    </div>


    {{-- Histórico --}}
    <div class="mb-4">

        <h2 class="text-2xl font-bold tracking-wide text-slate-800">
            HISTÓRICO DE MOVIMENTAÇÕES
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Acompanhe as movimentações realizadas para este item.
        </p>

    </div>


    <div class="bg-white rounded-xl border border-slate-200 shadow-sm
                overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left">

                <thead class="bg-slate-800 text-white uppercase text-xs">

                    <tr>

                        <th class="px-5 py-4 whitespace-nowrap">
                            Data
                        </th>

                        <th class="px-5 py-4 whitespace-nowrap">
                            Tipo
                        </th>

                        <th class="px-5 py-4 whitespace-nowrap">
                            Qtd.
                        </th>

                        <th class="px-5 py-4 whitespace-nowrap">
                            De
                        </th>

                        <th class="px-5 py-4 whitespace-nowrap">
                            Para
                        </th>

                        <th class="px-5 py-4">
                            Observação
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse ($item->movimentacoes as $mov)

                        <tr class="hover:bg-slate-50 transition">

                            <td class="px-5 py-4 text-slate-700 whitespace-nowrap">
                                {{ $mov->created_at->format('d/m/Y H:i') }}
                            </td>


                            <td class="px-5 py-4 whitespace-nowrap">

                                @if ($mov->tipo === 'entrada')

                                    <span class="inline-flex items-center px-2.5 py-1
                                                 rounded-full text-xs font-semibold
                                                 bg-emerald-100 text-emerald-700">
                                        ENTRADA
                                    </span>

                                @elseif ($mov->tipo === 'saida')

                                    <span class="inline-flex items-center px-2.5 py-1
                                                 rounded-full text-xs font-semibold
                                                 bg-red-100 text-red-700">
                                        SAÍDA
                                    </span>

                                @else

                                    <span class="inline-flex items-center px-2.5 py-1
                                                 rounded-full text-xs font-semibold
                                                 bg-blue-100 text-blue-700">
                                        TRANSFERÊNCIA
                                    </span>

                                @endif

                            </td>


                            <td class="px-5 py-4 font-semibold text-slate-800 whitespace-nowrap">
                                {{ $mov->quantidade }}
                            </td>


                            <td class="px-5 py-4 text-slate-500 whitespace-nowrap">
                                {{ $mov->localOrigem->nome ?? '—' }}
                            </td>


                            <td class="px-5 py-4 text-slate-500 whitespace-nowrap">
                                {{ $mov->localDestino->nome ?? '—' }}
                            </td>


                            <td class="px-5 py-4 text-slate-500 min-w-[200px]">
                                {{ $mov->observacao ?? '—' }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="px-5 py-12 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="w-12 h-12 rounded-full bg-slate-100
                                                flex items-center justify-center mb-3">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke-width="1.5"
                                             stroke="currentColor"
                                             class="w-6 h-6 text-slate-400">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M12 6v6l4 2" />

                                        </svg>

                                    </div>

                                    <p class="font-medium text-slate-600">
                                        Nenhuma movimentação registrada
                                    </p>

                                    <p class="text-sm text-slate-400 mt-1">
                                        Este item ainda não possui movimentações.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- Voltar --}}
    <div class="mt-6">

        <a href="{{ route('itens.index') }}"
           class="inline-flex items-center gap-2
                  text-sm font-semibold text-slate-500
                  hover:text-slate-800 transition">

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

            VOLTAR PARA ITENS

        </a>

    </div>

@endsection