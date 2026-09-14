@extends('layouts.app')

@section('title', 'Itens')

@php
    $badges = [
        'disponivel' => 'bg-emerald-100 text-emerald-700',
        'em_uso' => 'bg-blue-100 text-blue-700',
        'manutencao' => 'bg-amber-100 text-amber-700',
        'baixado' => 'bg-slate-200 text-slate-600',
    ];

    $rotulos = [
        'disponivel' => 'Disponível',
        'em_uso' => 'Em uso',
        'manutencao' => 'Manutenção',
        'baixado' => 'Baixado',
    ];
@endphp

@section('content')

    {{-- Cabeçalho da página --}}
    <div class="flex items-center justify-between gap-4 flex-wrap mb-6">

        <div>
            <h1 class="text-3xl font-extrabold tracking-wide text-slate-800">
                ITENS
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Gerencie os itens cadastrados no almoxarifado
            </p>
        </div>

        <a href="{{ route('itens.create') }}"
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

            NOVO ITEM
        </a>

    </div>


    {{-- Filtros --}}
    <form method="GET"
          class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 mb-6">

        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">

            {{-- Busca --}}
            <div class="md:col-span-6">

                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Buscar por nome
                </label>

                <div class="relative">

                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor"
                             class="w-5 h-5 text-slate-400">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1010.5 3a7.5 7.5 0 006.15 13.65z" />
                        </svg>

                    </div>

                    <input type="text"
                           name="busca"
                           value="{{ request('busca') }}"
                           placeholder="Digite o nome do item..."
                           class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-slate-300
                                  text-sm text-slate-700
                                  focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                </div>

            </div>


            {{-- Status --}}
            <div class="md:col-span-4">

                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Status
                </label>

                <select name="status"
                        class="w-full rounded-lg border border-slate-300
                               py-2.5 px-3 text-sm text-slate-700
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    <option value="">Todos os status</option>

                    @foreach ($rotulos as $valor => $rotulo)

                        <option value="{{ $valor }}"
                            @selected(request('status') === $valor)>
                            {{ $rotulo }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Botão filtrar --}}
            <div class="md:col-span-2">

                <button type="submit"
                        class="w-full inline-flex justify-center items-center gap-2
                               bg-slate-900 hover:bg-slate-800
                               text-white px-4 py-2.5 rounded-lg
                               text-sm font-semibold transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.5"
                         stroke="currentColor"
                         class="w-4 h-4">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M3 4.5h18M6.75 9.75h10.5M10.5 15h3M12 19.5v-4.5" />
                    </svg>

                    Filtrar

                </button>

            </div>

        </div>


        {{-- Limpar filtros --}}
        @if (request('busca') || request('status'))

            <div class="mt-3">

                <a href="{{ route('itens.index') }}"
                   class="text-sm text-slate-500 hover:text-blue-600 transition">
                    Limpar filtros
                </a>

            </div>

        @endif

    </form>


    {{-- Tabela --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">

        {{-- Cabeçalho da tabela --}}
        <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">

            <div>

                <h2 class="text-base font-semibold text-slate-800">
                    Itens cadastrados
                </h2>

                <p class="text-sm text-slate-500 mt-0.5">
                    Lista dos itens registrados no sistema
                </p>

            </div>

            <div class="text-sm text-slate-500">
                {{ $itens->total() }} item(ns)
            </div>

        </div>


        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left">

                <thead class="bg-slate-900 text-slate-200">

                    <tr>

                        <th class="px-5 py-4 font-semibold">
                            Nome
                        </th>

                        <th class="px-5 py-4 font-semibold">
                            Categoria
                        </th>

                        <th class="px-5 py-4 font-semibold">
                            Local
                        </th>

                        <th class="px-5 py-4 font-semibold">
                            Quantidade
                        </th>

                        <th class="px-5 py-4 font-semibold">
                            Status
                        </th>

                        <th class="px-5 py-4 font-semibold text-right">
                            Ações
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse ($itens as $item)

                        <tr class="hover:bg-slate-50 transition">

                            {{-- Nome --}}
                            <td class="px-5 py-4">

                                <a href="{{ route('itens.show', $item) }}"
                                   class="font-semibold text-slate-800 hover:text-blue-600 transition">
                                    {{ $item->nome }}
                                </a>

                            </td>


                            {{-- Categoria --}}
                            <td class="px-5 py-4 text-slate-500">
                                {{ $item->categoria->nome }}
                            </td>


                            {{-- Local --}}
                            <td class="px-5 py-4 text-slate-500">
                                {{ $item->local->nome }}
                            </td>


                            {{-- Quantidade --}}
                            <td class="px-5 py-4">

                                <span class="font-semibold text-slate-700">
                                    {{ $item->quantidade }}
                                </span>

                            </td>


                            {{-- Status --}}
                            <td class="px-5 py-4">

                                <span class="inline-flex items-center px-2.5 py-1
                                             rounded-full text-xs font-semibold
                                             {{ $badges[$item->status] }}">

                                    {{ $rotulos[$item->status] }}

                                </span>

                            </td>


                            {{-- Ações --}}
                            <td class="px-5 py-4 text-right">

                                <div class="inline-flex items-center gap-2">


                                    {{-- Ver --}}
                                    <a href="{{ route('itens.show', $item) }}"
                                       title="Ver"
                                       class="group relative w-9 h-9 inline-flex items-center justify-center
                                              rounded-lg text-slate-500
                                              hover:bg-blue-50 hover:text-blue-600
                                              transition">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke-width="1.8"
                                             stroke="currentColor"
                                             class="w-5 h-5">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M2.25 12s3.75-6 9.75-6 9.75 6 9.75 6-3.75 6-9.75 6-9.75-6-9.75-6z" />

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M12 15.25a3.25 3.25 0 100-6.5 3.25 3.25 0 000 6.5z" />

                                        </svg>

                                        <span class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2
                                                     hidden group-hover:block
                                                     bg-slate-900 text-white text-xs
                                                     rounded-md px-2 py-1 whitespace-nowrap
                                                     shadow-lg z-20">
                                            Ver
                                        </span>

                                    </a>


                                    {{-- Editar --}}
                                    <a href="{{ route('itens.edit', $item) }}"
                                       title="Editar"
                                       class="group relative w-9 h-9 inline-flex items-center justify-center
                                              rounded-lg text-blue-600
                                              hover:bg-blue-50 hover:text-blue-700
                                              transition">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke-width="1.8"
                                             stroke="currentColor"
                                             class="w-5 h-5">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M16.862 3.487a2.25 2.25 0 013.182 3.182L8.25 18.463 4 19.5l1.037-4.25L16.862 3.487z" />

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M14.75 5.75l3.5 3.5" />

                                        </svg>

                                        <span class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2
                                                     hidden group-hover:block
                                                     bg-slate-900 text-white text-xs
                                                     rounded-md px-2 py-1 whitespace-nowrap
                                                     shadow-lg z-20">
                                            Editar
                                        </span>

                                    </a>


                                    {{-- Excluir --}}
                                    <form action="{{ route('itens.destroy', $item) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Remover este item?')">

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

                                            <span class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2
                                                         hidden group-hover:block
                                                         bg-slate-900 text-white text-xs
                                                         rounded-md px-2 py-1 whitespace-nowrap
                                                         shadow-lg z-20">
                                                Excluir
                                            </span>

                                        </button>

                                    </form>

                                </div>

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
                                                  d="M20.25 7.5l-8.25-4.5-8.25 4.5m16.5 0v9l-8.25 4.5m8.25-13.5L12 12m0 0L3.75 7.5M12 12v9m-8.25-4.5v-9" />

                                        </svg>

                                    </div>

                                    <p class="text-sm font-medium text-slate-600">
                                        Nenhum item encontrado.
                                    </p>

                                    <p class="text-xs text-slate-400 mt-1">
                                        Tente alterar os filtros ou cadastrar um novo item.
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
    @if ($itens->hasPages())

        <div class="mt-5">
            {{ $itens->links() }}
        </div>

    @endif

@endsection