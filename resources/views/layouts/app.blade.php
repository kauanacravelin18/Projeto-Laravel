<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Sistema de Almoxarifado')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-100">

    <div class="min-h-screen">

        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Área principal --}}
        <div class="lg:ml-64 min-h-screen">

            {{-- Barra superior --}}
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 sticky top-0 z-30">

                {{-- Espaço para o botão mobile --}}
                <button
                    @click="$dispatch('open-sidebar')"
                    class="lg:hidden text-gray-500 hover:text-gray-700"
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.5"
                         stroke="currentColor"
                         class="w-6 h-6">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
                    </svg>
                </button>

                <div class="flex-1"></div>

                {{-- Usuário --}}
                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button class="inline-flex items-center gap-2 px-2 py-1.5 rounded-md hover:bg-gray-50 text-sm font-medium text-gray-700">

                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor"
                                     class="w-5 h-5">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0" />

                                </svg>

                            </div>

                            {{ Auth::user()->name }}

                            <svg class="w-4 h-4 text-gray-400"
                                 fill="currentColor"
                                 viewBox="0 0 20 20">

                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd" />

                            </svg>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            Perfil
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                Sair
                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </header>

            {{-- Conteúdo --}}
            <main class="p-6">

                @yield('content')

            </main>

        </div>

    </div>

</body>
</html>