@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    @php
        $totalItens = \App\Models\Item::count();
        $totalCategorias = \App\Models\Categoria::count();
        $totalLocais = \App\Models\Local::count();
        $totalMovimentacoes = \App\Models\Movimentacao::count();

        $itensDisponiveis = \App\Models\Item::where('status', 'disponivel')->count();
        $itensEmUso = \App\Models\Item::where('status', 'em_uso')->count();
        $itensManutencao = \App\Models\Item::where('status', 'manutencao')->count();
    @endphp

    {{-- Cabeçalho --}}
    <div class="mb-8">

        {{-- Saudação --}}
        <div class="mb-2">
            <p class="text-base text-slate-600">
                Olá,
                <span class="font-semibold text-slate-800">
                    {{ Auth::user()->name }}
                </span>!
            </p>
        </div>

        {{-- Título principal --}}
        <div class="flex justify-center items-center py-2">

            <div class="flex items-center gap-4">

                <div class="w-12 h-12 rounded-xl bg-blue-600 flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.5"
                         stroke="white"
                         class="w-7 h-7">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M20.25 7.5l-8.25-4.5-8.25 4.5m16.5 0v9l-8.25 4.5m8.25-13.5L12 12m0 0L3.75 7.5M12 12v9m-8.25-4.5v-9" />

                    </svg>
                </div>

                <h1 class="text-4xl font-extrabold tracking-wide text-blue-700">
                    ALMOXARIFADO
                </h1>

            </div>

        </div>

        <p class="text-center text-sm text-slate-500 mt-2">
            Visão geral do sistema
        </p>

    </div>


    {{-- Cards principais --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

        {{-- Total de itens --}}
        <div class="bg-slate-900 rounded-xl border border-slate-800 p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-400">
                        Total de itens
                    </p>

                    <p class="mt-2 text-3xl font-bold text-white">
                        {{ $totalItens }}
                    </p>
                </div>

                <div class="w-11 h-11 rounded-lg bg-blue-600 flex items-center justify-center text-white">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.5"
                         stroke="currentColor"
                         class="w-6 h-6">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M20.25 7.5l-8.25-4.5-8.25 4.5m16.5 0v9l-8.25 4.5m8.25-13.5L12 12m0 0L3.75 7.5M12 12v9m-8.25-4.5v-9" />

                    </svg>

                </div>

            </div>

            <a href="{{ route('itens.index') }}"
               class="inline-block mt-4 text-sm font-medium text-blue-400 hover:text-blue-300">
                Ver itens →
            </a>

        </div>


        {{-- Categorias --}}
        <div class="bg-slate-900 rounded-xl border border-slate-800 p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-400">
                        Categorias
                    </p>

                    <p class="mt-2 text-3xl font-bold text-white">
                        {{ $totalCategorias }}
                    </p>
                </div>

                <div class="w-11 h-11 rounded-lg bg-blue-600 flex items-center justify-center text-white">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.5"
                         stroke="currentColor"
                         class="w-6 h-6">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M6 6h.008v.008H6V6z" />

                    </svg>

                </div>

            </div>

            <a href="{{ route('categorias.index') }}"
               class="inline-block mt-4 text-sm font-medium text-blue-400 hover:text-blue-300">
                Ver categorias →
            </a>

        </div>


        {{-- Locais --}}
        <div class="bg-slate-900 rounded-xl border border-slate-800 p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-400">
                        Locais
                    </p>

                    <p class="mt-2 text-3xl font-bold text-white">
                        {{ $totalLocais }}
                    </p>
                </div>

                <div class="w-11 h-11 rounded-lg bg-blue-600 flex items-center justify-center text-white">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.5"
                         stroke="currentColor"
                         class="w-6 h-6">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />

                    </svg>

                </div>

            </div>

            <a href="{{ route('locais.index') }}"
               class="inline-block mt-4 text-sm font-medium text-blue-400 hover:text-blue-300">
                Ver locais →
            </a>

        </div>


        {{-- Movimentações --}}
        <div class="bg-slate-900 rounded-xl border border-slate-800 p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-400">
                        Movimentações
                    </p>

                    <p class="mt-2 text-3xl font-bold text-white">
                        {{ $totalMovimentacoes }}
                    </p>
                </div>

                <div class="w-11 h-11 rounded-lg bg-blue-600 flex items-center justify-center text-white">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.5"
                         stroke="currentColor"
                         class="w-6 h-6">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />

                    </svg>

                </div>

            </div>

            <a href="{{ route('movimentacoes.index') }}"
               class="inline-block mt-4 text-sm font-medium text-blue-400 hover:text-blue-300">
                Ver movimentações →
            </a>

        </div>

    </div>


    {{-- Parte inferior --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Situação dos itens --}}
        <div class="lg:col-span-2 bg-slate-900 rounded-xl border border-slate-800 shadow-sm">

            <div class="px-6 py-5 border-b border-slate-800">

                <h2 class="text-lg font-semibold text-white">
                    Situação dos itens
                </h2>

                <p class="text-sm text-slate-400 mt-1">
                    Distribuição atual dos itens cadastrados
                </p>

            </div>

            <div class="p-6 grid grid-cols-1 sm:grid-cols-3 gap-4">

                {{-- Disponíveis --}}
                <div class="rounded-lg bg-slate-800 border border-slate-700 p-4">

                    <p class="text-sm text-slate-400">
                        Disponíveis
                    </p>

                    <p class="mt-2 text-2xl font-bold text-white">
                        {{ $itensDisponiveis }}
                    </p>

                </div>

                {{-- Em uso --}}
                <div class="rounded-lg bg-slate-800 border border-slate-700 p-4">

                    <p class="text-sm text-slate-400">
                        Em uso
                    </p>

                    <p class="mt-2 text-2xl font-bold text-white">
                        {{ $itensEmUso }}
                    </p>

                </div>

                {{-- Manutenção --}}
                <div class="rounded-lg bg-slate-800 border border-slate-700 p-4">

                    <p class="text-sm text-slate-400">
                        Em manutenção
                    </p>

                    <p class="mt-2 text-2xl font-bold text-white">
                        {{ $itensManutencao }}
                    </p>

                </div>

            </div>

        </div>


        {{-- Ações rápidas --}}
        <div class="bg-slate-900 rounded-xl border border-slate-800 shadow-sm">

            <div class="px-6 py-5 border-b border-slate-800">

                <h2 class="text-lg font-semibold text-white">
                    Ações rápidas
                </h2>

                <p class="text-sm text-slate-400 mt-1">
                    Acesse as principais funções
                </p>

            </div>

            <div class="p-6 space-y-3">

                <a href="{{ route('itens.index') }}"
                   class="flex items-center justify-between w-full rounded-lg border border-slate-700 px-4 py-3 text-sm font-medium text-slate-200 hover:bg-slate-800 transition">

                    <span>Gerenciar itens</span>

                    <span class="text-blue-400">→</span>

                </a>

                <a href="{{ route('locais.index') }}"
                   class="flex items-center justify-between w-full rounded-lg border border-slate-700 px-4 py-3 text-sm font-medium text-slate-200 hover:bg-slate-800 transition">

                    <span>Gerenciar locais</span>

                    <span class="text-blue-400">→</span>

                </a>

                <a href="{{ route('movimentacoes.index') }}"
                   class="flex items-center justify-between w-full rounded-lg border border-slate-700 px-4 py-3 text-sm font-medium text-slate-200 hover:bg-slate-800 transition">

                    <span>Ver movimentações</span>

                    <span class="text-blue-400">→</span>

                </a>

            </div>

        </div>

    </div>

@endsection