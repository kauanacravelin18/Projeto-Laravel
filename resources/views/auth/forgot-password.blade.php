```blade
<x-guest-layout>

    <div class="min-h-screen bg-slate-100 flex items-center justify-center px-4">

        <div class="w-full max-w-md">

            {{-- Logo / Identidade --}}
            <div class="flex flex-col items-center mb-6">

                <div class="w-14 h-14 rounded-xl bg-blue-600 flex items-center justify-center shadow-lg">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="white"
                        class="w-8 h-8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M20.25 7.5l-8.25-4.5-8.25 4.5m16.5 0v9l-8.25 4.5m8.25-13.5L12 12m0 0L3.75 7.5M12 12v9m-8.25-4.5v-9"
                        />
                    </svg>
                </div>

                <h1 class="mt-3 text-xl font-bold text-slate-900">
                    SISTEMA DE
                    <span class="text-blue-600">ALMOXARIFADO</span>
                </h1>

            </div>

            {{-- Card --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">

                {{-- Título --}}
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-slate-900">
                        Esqueceu sua senha?
                    </h2>

                    <p class="mt-2 text-sm text-gray-500 leading-relaxed">
                        Não tem problema. Informe seu endereço de e-mail
                        e enviaremos um link para você criar uma nova senha.
                    </p>
                </div>

                {{-- Status da sessão --}}
                <x-auth-session-status
                    class="mb-4"
                    :status="session('status')"
                />

                {{-- Formulário --}}
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    {{-- E-mail --}}
                    <div>
                        <x-input-label
                            for="email"
                            value="E-mail"
                            class="text-sm font-medium text-slate-700"
                        />

                        <x-text-input
                            id="email"
                            class="block mt-2 w-full rounded-lg border-gray-300
                                   focus:border-blue-500 focus:ring-blue-500"
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

                    {{-- Botão --}}
                    <div class="mt-6">
                        <x-primary-button
                            class="w-full justify-center py-3 bg-blue-600
                                   hover:bg-blue-700 focus:bg-blue-700
                                   active:bg-blue-800"
                        >
                            Enviar link de recuperação
                        </x-primary-button>
                    </div>

                    {{-- Voltar --}}
                    <div class="mt-5 text-center">
                        <a
                            href="{{ route('login') }}"
                            class="text-sm font-medium text-blue-600
                                   hover:text-blue-700"
                        >
                            ← Voltar para o login
                        </a>
                    </div>

                </form>

            </div>

            {{-- Rodapé --}}
            <p class="mt-6 text-center text-xs text-gray-400">
                © {{ date('Y') }} Sistema de Almoxarifado
            </p>

        </div>

    </div>

</x-guest-layout>
```
