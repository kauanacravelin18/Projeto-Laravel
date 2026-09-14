@extends('layouts.app')

@section('title', 'Locais')

@section('content')

    {{-- Cabeçalho da página --}}
    <div class="flex items-center justify-between gap-4 flex-wrap mb-6">

        <div>
            <h1 class="text-3xl font-extrabold tracking-wide text-slate-800">
                LOCAIS
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Gerencie os locais cadastrados no almoxarifado
            </p>
        </div>

        <a href="{{ route('locais.create') }}"
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

            NOVO LOCAL
        </a>

    </div>


    {{-- Tabela --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">

        {{-- Cabeçalho da tabela --}}
        <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">

            <div>
                <h2 class="text-base font-semibold text-slate-800">
                    Locais cadastrados
                </h2>

                <p class="text-sm text-slate-500 mt-0.5">
                    Lista dos locais registrados no sistema
                </p>
            </div>

            <div class="text-sm text-slate-500">
                {{ $locais->total() }} local(is)
            </div>

        </div>


        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left">

                {{-- Cabeçalho azul escuro --}}
                <thead class="bg-slate-900 text-slate-200">

                    <tr>

                        <th class="px-5 py-4 font-semibold">
                            Nome
                        </th>

                        <th class="px-5 py-4 font-semibold">
                            Descrição
                        </th>

                        <th class="px-5 py-4 font-semibold">
                            Itens
                        </th>

                        <th class="px-5 py-4 font-semibold text-right">
                            Ações
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse ($locais as $local)

                        <tr class="hover:bg-slate-50 transition">

                            {{-- Nome --}}
                            <td class="px-5 py-4">

                                <span class="font-semibold text-slate-800">
                                    {{ $local->nome }}
                                </span>

                            </td>


                            {{-- Descrição --}}
                            <td class="px-5 py-4 text-slate-500">

                                {{ $local->descricao ?? '—' }}

                            </td>


                            {{-- Itens --}}
                            <td class="px-5 py-4">

                                <span class="inline-flex items-center justify-center
                                             min-w-8 px-2.5 py-1
                                             rounded-full bg-slate-100
                                             text-slate-700 text-xs font-semibold">

                                    {{ $local->itens_count }}

                                </span>

                            </td>


                            {{-- Ações --}}
                            <td class="px-5 py-4 text-right">

                                <div class="inline-flex items-center gap-2">

                                    {{-- Editar --}}
                                    <a href="{{ route('locais.edit', $local) }}"
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
                                    <form action="{{ route('locais.destroy', $local) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Remover este local?')">

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

                            <td colspan="4" class="px-5 py-12 text-center">

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
                                                  d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />

                                        </svg>

                                    </div>

                                    <p class="text-sm font-medium text-slate-600">
                                        Nenhum local cadastrado.
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
    @if ($locais->hasPages())

        <div class="mt-5">
            {{ $locais->links() }}
        </div>

    @endif

@endsection