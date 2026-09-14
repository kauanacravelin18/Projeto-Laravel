@extends('layouts.app')

@section('title', 'Movimentações')

@section('content')

    {{-- Cabeçalho da página --}}
    <div class="flex items-center justify-between gap-4 flex-wrap mb-6">

        <div>
            <h1 class="text-3xl font-extrabold tracking-wide text-slate-800">
                MOVIMENTAÇÕES
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Acompanhe as entradas, saídas e transferências do almoxarifado
            </p>
        </div>

        <a href="{{ route('movimentacoes.create') }}"
           class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800
                  text-white px-4 py-2.5 rounded-lg text-sm font-semibold
                  shadow-sm transition">

            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke-width="2"
                 stroke="currentColor"
                 class="w-5 h-5">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M12 4.5v15m7.5-7.5h-15" />

            </svg>

            REGISTRAR MOVIMENTAÇÃO
        </a>

    </div>


    {{-- Tabela --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">

        {{-- Cabeçalho da tabela --}}
        <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">

            <div>
                <h2 class="text-base font-semibold text-slate-800">
                    Histórico de movimentações
                </h2>

                <p class="text-sm text-slate-500 mt-0.5">
                    Registro das movimentações realizadas no sistema
                </p>
            </div>

            <div class="text-sm text-slate-500">
                {{ $movimentacoes->total() }} movimentação(ões)
            </div>

        </div>


        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left whitespace-nowrap">

                {{-- Cabeçalho azul escuro --}}
                <thead class="bg-slate-900 text-slate-200">

                    <tr>

                        <th class="px-4 py-4 font-semibold">
                            Data
                        </th>

                        <th class="px-4 py-4 font-semibold">
                            Item
                        </th>

                        <th class="px-4 py-4 font-semibold">
                            Tipo
                        </th>

                        <th class="px-4 py-4 font-semibold">
                            Qtd.
                        </th>

                        <th class="px-4 py-4 font-semibold">
                            De
                        </th>

                        <th class="px-4 py-4 font-semibold">
                            Para
                        </th>

                        <th class="px-4 py-4 font-semibold">
                            Usuário
                        </th>

                        <th class="px-4 py-4 font-semibold text-right">
                            Ações
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse ($movimentacoes as $mov)

                        <tr class="hover:bg-slate-50 transition">

                            {{-- Data --}}
                            <td class="px-4 py-4 text-slate-500">
                                {{ $mov->created_at->format('d/m/Y H:i') }}
                            </td>


                            {{-- Item --}}
                            <td class="px-4 py-4">

                                <a href="{{ route('itens.show', $mov->item) }}"
                                   class="font-semibold text-slate-800 hover:text-blue-600 transition">

                                    {{ $mov->item->nome }}

                                </a>

                            </td>


                            {{-- Tipo --}}
                            <td class="px-4 py-4">

                                @php
                                    $tipoClasses = [
                                        'entrada' => 'bg-emerald-100 text-emerald-700',
                                        'saida' => 'bg-red-100 text-red-700',
                                        'transferencia' => 'bg-blue-100 text-blue-700',
                                    ];

                                    $tipoClasse = $tipoClasses[$mov->tipo] ?? 'bg-slate-100 text-slate-700';
                                @endphp

                                <span class="inline-flex items-center px-2.5 py-1 rounded-full
                                             text-xs font-semibold {{ $tipoClasse }}">

                                    {{ ucfirst($mov->tipo) }}

                                </span>

                            </td>


                            {{-- Quantidade --}}
                            <td class="px-4 py-4 font-semibold text-slate-700">
                                {{ $mov->quantidade }}
                            </td>


                            {{-- Local de origem --}}
                            <td class="px-4 py-4 text-slate-500">
                                {{ $mov->localOrigem->nome ?? '—' }}
                            </td>


                            {{-- Local de destino --}}
                            <td class="px-4 py-4 text-slate-500">
                                {{ $mov->localDestino->nome ?? '—' }}
                            </td>


                            {{-- Usuário --}}
                            <td class="px-4 py-4 text-slate-500">
                                {{ $mov->usuario->name ?? '—' }}
                            </td>


                            {{-- Ações --}}
                            <td class="px-4 py-4 text-right">

                                <form action="{{ route('movimentacoes.destroy', $mov) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Remover esta movimentação?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            title="Excluir"
                                            class="group relative w-9 h-9 inline-flex items-center justify-center
                                                   rounded-lg text-red-500
                                                   hover:bg-red-50 hover:text-red-600
                                                   transition">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke-width="1.8"
                                             stroke="currentColor"
                                             class="w-5 h-5">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M6 7.5h12M9.75 7.5V5.25h4.5V7.5M8.25 7.5l.75 12h6l.75-12M10.5 11v5.25M13.5 11v5.25" />

                                        </svg>

                                        <span class="absolute bottom-full mb-2 right-0
                                                     hidden group-hover:block
                                                     bg-slate-900 text-white text-xs
                                                     rounded-md px-2 py-1 whitespace-nowrap
                                                     shadow-lg z-20">

                                            Excluir

                                        </span>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8" class="px-5 py-12 text-center">

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
                                                  d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z" />

                                        </svg>

                                    </div>

                                    <p class="text-sm font-medium text-slate-600">
                                        Nenhuma movimentação registrada.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- Paginação --}}
    @if ($movimentacoes->hasPages())

        <div class="mt-5">
            {{ $movimentacoes->links() }}
        </div>

    @endif

@endsection