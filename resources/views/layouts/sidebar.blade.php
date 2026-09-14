<aside
    x-data="{ open: false }"
    @open-sidebar.window="open = true"
    class="lg:block"
>
    {{-- Overlay mobile --}}
    <div
        x-show="open"
        x-transition.opacity
        @click="open = false"
        class="fixed inset-0 bg-black/50 z-40 lg:hidden"
        style="display: none;"
    ></div>

    <div
        :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-950 flex flex-col
               transform transition-transform duration-200 ease-in-out
               lg:translate-x-0"
    >
        {{-- Logo --}}
        <div class="h-16 flex items-center gap-3 px-5 border-b border-slate-800 shrink-0">
            <div class="w-9 h-9 rounded-lg bg-blue-600 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="white" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M20.25 7.5l-8.25-4.5-8.25 4.5m16.5 0v9l-8.25 4.5m8.25-13.5L12 12m0 0L3.75 7.5M12 12v9m-8.25-4.5v-9" />
                </svg>
            </div>
            <span class="text-white font-bold leading-tight text-sm">
                SISTEMA DE<br><span class="text-blue-500">ALMOXARIFADO</span>
            </span>
        </div>

        {{-- Links --}}
        <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
            <x-sidebar-link :href="route('itens.index')" :active="request()->routeIs('dashboard')">
                <x-slot name="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </x-slot>
                Dashboard
            </x-sidebar-link>

            <x-sidebar-link :href="route('itens.index')" :active="request()->routeIs('itens.*')">
                <x-slot name="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-8.25-4.5-8.25 4.5m16.5 0v9l-8.25 4.5m8.25-13.5L12 12m0 0L3.75 7.5M12 12v9m-8.25-4.5v-9" />
                </x-slot>
                Itens
            </x-sidebar-link>

            <x-sidebar-link :href="route('categorias.index')" :active="request()->routeIs('categorias.*')">
                <x-slot name="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                </x-slot>
                Categorias
            </x-sidebar-link>

            <x-sidebar-link :href="route('locais.index')" :active="request()->routeIs('locais.*')">
                <x-slot name="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </x-slot>
                Locais
            </x-sidebar-link>

            <x-sidebar-link :href="route('movimentacoes.index')" :active="request()->routeIs('movimentacoes.*')">
                <x-slot name="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                </x-slot>
                Movimentações
            </x-sidebar-link>

            <x-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.*')">
                <x-slot name="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </x-slot>
                Perfil
            </x-sidebar-link>
        </nav>

        {{-- Rodapé --}}
        <div class="px-5 py-4 border-t border-slate-800 flex items-center gap-2 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="#64748b" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-8.25-4.5-8.25 4.5m16.5 0v9l-8.25 4.5m8.25-13.5L12 12m0 0L3.75 7.5M12 12v9m-8.25-4.5v-9" />
            </svg>
            <div class="leading-tight">
                <p class="text-slate-400 text-xs font-semibold">SISTEMA DE ALMOXARIFADO</p>
                <p class="text-slate-600 text-xs">v1.0</p>
            </div>
        </div>
    </div>
</aside>