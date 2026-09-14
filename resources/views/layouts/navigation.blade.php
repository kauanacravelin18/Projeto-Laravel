<nav class="fixed left-0 top-0 z-40 h-screen w-60 bg-slate-950 text-white shadow-lg">

    <!-- Logo -->
    <div class="flex h-20 items-center gap-3 border-b border-slate-800 px-6">
        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-6 w-6"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m0 0L4 7m8 4v10" />
            </svg>
        </div>

        <div>
            <div class="text-sm font-semibold tracking-wide">
                ALMOXARIFADO
            </div>
            <div class="text-xs text-slate-400">
                Sistema de Controle
            </div>
        </div>
    </div>

    <!-- Menu -->
    <div class="px-3 py-6">

        <p class="px-3 mb-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
            Menu
        </p>

        <div class="space-y-1">

            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium
               {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 12l9-9 9 9M5 10v10h14V10" />
                </svg>

                Dashboard
            </a>

            <!-- Itens -->
            <a href="{{ route('itens.index') }}"
               class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium
               {{ request()->routeIs('itens.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m0 0L4 7m8 4v10" />
                </svg>

                Itens
            </a>

            <!-- Categorias -->
            <a href="{{ route('categorias.index') }}"
               class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium
               {{ request()->routeIs('categorias.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M7 7h.01M4 4h5l11 11-5 5L4 9V4z" />
                </svg>

                Categorias
            </a>

            <!-- Locais -->
            <a href="{{ route('locais.index') }}"
               class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium
               {{ request()->routeIs('locais.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 21s7-6.2 7-12a7 7 0 10-14 0c0 5.8 7 12 7 12z" />
                    <circle cx="12" cy="9" r="2.5" />
                </svg>

                Locais
            </a>

            <!-- Movimentações -->
            <a href="{{ route('movimentacoes.index') }}"
               class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium
               {{ request()->routeIs('movimentacoes.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M7 7h10M7 17h10M4 4l3 3-3 3M20 14l-3 3 3 3" />
                </svg>

                Movimentações
            </a>

        </div>
    </div>

    <!-- Parte inferior -->
    <div class="absolute bottom-0 left-0 w-full border-t border-slate-800 p-4">

        <a href="{{ route('profile.edit') }}"
           class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>

            Perfil
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                    class="mt-1 flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-slate-300 hover:bg-red-900/30 hover:text-red-400">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2h5a2 2 0 012 2v1" />
                </svg>

                Sair
            </button>
        </form>

    </div>

</nav>