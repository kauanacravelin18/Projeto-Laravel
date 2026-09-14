<x-guest-layout>

    <div class="min-h-screen bg-slate-950 flex">

        {{-- PAINEL ESQUERDO --}}
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden">

            {{-- Fundo --}}
            <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900"></div>

            {{-- Detalhes --}}
            <div class="absolute -top-40 -left-40 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl"></div>

            {{-- Faixas decorativas --}}
            <div class="absolute top-0 left-0 w-64 h-2 bg-blue-600"></div>
            <div class="absolute top-0 left-0 w-2 h-64 bg-blue-600"></div>

            <div class="absolute bottom-0 right-0 w-64 h-2 bg-blue-600"></div>
            <div class="absolute bottom-0 right-0 w-2 h-64 bg-blue-600"></div>

            {{-- Conteúdo --}}
            <div class="relative z-10 flex items-center px-16 xl:px-24">

                <div class="max-w-xl text-white">

                    {{-- Ícone --}}
                    <div class="w-20 h-20 rounded-2xl bg-blue-600 flex items-center justify-center mb-8 shadow-xl shadow-blue-900/40">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor"
                             class="w-11 h-11">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M20.25 7.5l-8.25-4.5-8.25 4.5m16.5 0v9l-8.25 4.5m8.25-13.5L12 12m0 0L3.75 7.5M12 12v9m-8.25-4.5v-9" />

                        </svg>

                    </div>


                    {{-- Nome --}}
                    <h1 class="text-4xl xl:text-5xl font-bold tracking-tight leading-tight">

                        SISTEMA DE

                        <span class="block text-blue-500">
                            ALMOXARIFADO
                        </span>

                    </h1>


                    {{-- Linha azul --}}
                    <div class="w-20 h-1 bg-blue-600 rounded-full mt-7 mb-7"></div>


                    {{-- Descrição --}}
                    <p class="text-lg text-slate-300 leading-relaxed max-w-lg">

                        Controle seus itens, categorias, locais e movimentações
                        de forma simples, organizada e eficiente.

                    </p>


                    {{-- Informações --}}
                    <div class="flex items-center gap-8 mt-12 text-sm text-slate-400">

                        <div class="flex items-center gap-2">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="currentColor"
                                 class="w-5 h-5 text-blue-500">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.623 0-1.31-.21-2.573-.598-3.751A11.959 11.959 0 0112 2.714z" />

                            </svg>

                            Mais controle

                        </div>


                        <div class="h-5 w-px bg-slate-700"></div>


                        <div class="flex items-center gap-2">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="currentColor"
                                 class="w-5 h-5 text-blue-500">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0m-3 0H3.75m6.75 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3 0H3.75m12-6h4.5m-4.5 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3 0h-6.75" />

                            </svg>

                            Organização

                        </div>


                        <div class="h-5 w-px bg-slate-700"></div>


                        <div class="flex items-center gap-2">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="currentColor"
                                 class="w-5 h-5 text-blue-500">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M3 13.5l4.5-4.5 3 3L15 7.5l6 6" />

                            </svg>

                            Eficiência

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- PAINEL DIREITO --}}
        <div class="w-full lg:w-1/2 bg-slate-950 flex items-center justify-center px-6 py-12">

            <div class="w-full max-w-md">


                {{-- Logo mobile --}}
                <div class="lg:hidden text-center mb-8">

                    <div class="inline-flex w-16 h-16 rounded-2xl bg-blue-600 items-center justify-center mb-4">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="white"
                             class="w-9 h-9">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M20.25 7.5l-8.25-4.5-8.25 4.5m16.5 0v9l-8.25 4.5m8.25-13.5L12 12m0 0L3.75 7.5M12 12v9m-8.25-4.5v-9" />

                        </svg>

                    </div>

                    <h1 class="text-2xl font-bold text-white">
                        SISTEMA DE ALMOXARIFADO
                    </h1>

                </div>


                {{-- CARD --}}
                <div class="bg-slate-900/80 border border-slate-700 rounded-2xl p-8 sm:p-10 shadow-2xl shadow-black/30">


                    {{-- Ícone --}}
                    <div class="flex justify-center mb-6">

                        <div class="w-14 h-14 rounded-xl bg-blue-600 flex items-center justify-center shadow-lg shadow-blue-900/40">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="white"
                                 class="w-8 h-8">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M20.25 7.5l-8.25-4.5-8.25 4.5m16.5 0v9l-8.25 4.5m8.25-13.5L12 12m0 0L3.75 7.5M12 12v9m-8.25-4.5v-9" />

                            </svg>

                        </div>

                    </div>


                    {{-- Título --}}
                    <div class="text-center mb-8">

                        <h2 class="text-3xl font-bold text-white">
                            Bem-vindo!
                        </h2>

                        <p class="mt-2 text-slate-400">
                            Acesse sua conta para continuar.
                        </p>

                    </div>


                    {{-- Status --}}
                    <x-auth-session-status
                        class="mb-4"
                        :status="session('status')"
                    />


                    {{-- FORM --}}
                    <form method="POST" action="{{ route('login') }}" class="space-y-5">

                        @csrf


                        {{-- E-mail --}}
                        <div>

                            <x-input-label
                                for="email"
                                :value="__('E-mail')"
                                class="text-slate-200 font-medium"
                            />

                            <x-text-input
                                id="email"
                                class="block mt-2 w-full rounded-lg
                                       bg-slate-800
                                       border-slate-600
                                       text-white
                                       placeholder-slate-500
                                       focus:border-blue-500
                                       focus:ring-blue-500"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="Digite seu e-mail"
                            />

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2"
                            />

                        </div>


                        {{-- Senha --}}
                        <div>

                            <x-input-label
                                for="password"
                                :value="__('Senha')"
                                class="text-slate-200 font-medium"
                            />

                            <x-text-input
                                id="password"
                                class="block mt-2 w-full rounded-lg
                                       bg-slate-800
                                       border-slate-600
                                       text-white
                                       placeholder-slate-500
                                       focus:border-blue-500
                                       focus:ring-blue-500"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Digite sua senha"
                            />

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2"
                            />

                        </div>


                        {{-- Lembrar + senha --}}
                        <div class="flex items-center justify-between">

                            <label
                                for="remember_me"
                                class="inline-flex items-center cursor-pointer"
                            >

                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    class="rounded border-slate-600
                                           bg-slate-800
                                           text-blue-600
                                           focus:ring-blue-500"
                                    name="remember"
                                >

                                <span class="ms-2 text-sm text-slate-400">
                                    Lembrar-me
                                </span>

                            </label>


                            @if (Route::has('password.request'))

                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-sm font-medium text-blue-500 hover:text-blue-400 transition"
                                >
                                    Esqueceu a senha?
                                </a>

                            @endif

                        </div>


                        {{-- Botão --}}
                        <button
                            type="submit"
                            class="w-full py-3.5 px-4
                                   bg-blue-600
                                   hover:bg-blue-500
                                   text-white
                                   font-semibold
                                   rounded-lg
                                   shadow-lg shadow-blue-900/30
                                   transition duration-200
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-blue-500
                                   focus:ring-offset-2
                                   focus:ring-offset-slate-900"
                        >
                            ENTRAR
                        </button>

                    </form>


                    {{-- Rodapé --}}
                    <div class="flex items-center gap-4 mt-8">

                        <div class="flex-1 h-px bg-slate-700"></div>

                        <span class="text-xs text-slate-500">
                            Sistema de Controle de Almoxarifado
                        </span>

                        <div class="flex-1 h-px bg-slate-700"></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>