@extends('layouts.app')

@section('title', 'Novo local')

@section('content')

    {{-- Cabeçalho --}}
    <div class="text-center mb-8">

        <h1 class="text-4xl font-extrabold tracking-wide text-slate-800">
            NOVO LOCAL
        </h1>

        <p class="mt-2 text-base text-slate-500">
            Cadastre um novo local no almoxarifado
        </p>

    </div>


    {{-- Formulário --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm
                overflow-hidden max-w-2xl mx-auto">

        {{-- Cabeçalho do formulário --}}
        <div class="px-6 py-5 border-b border-slate-200 text-center">

            <h2 class="text-xl font-bold tracking-wide text-slate-800">
                Dados do local
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Preencha as informações abaixo para cadastrar o local.
            </p>

        </div>


        <form action="{{ route('locais.store') }}"
              method="POST"
              class="p-6">

            @csrf

            <div class="space-y-5">

                @include('locais._form')

            </div>


            {{-- Botões --}}
            <div class="flex justify-between items-center gap-3
                        pt-6 mt-6 border-t border-slate-100">

                {{-- Voltar --}}
                <a href="{{ route('locais.index') }}"
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


                {{-- Salvar --}}
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

                    SALVAR LOCAL

                </button>

            </div>

        </form>

    </div>

@endsection