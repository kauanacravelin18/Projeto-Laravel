<section>

    <header>
        <h2 class="text-lg font-semibold text-slate-800">
            Alterar senha
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Certifique-se de que sua conta esteja usando uma senha segura.
        </p>
    </header>


    <form method="post"
          action="{{ route('password.update') }}"
          class="mt-6 space-y-6">

        @csrf
        @method('put')


        {{-- Senha atual --}}
        <div>
            <x-input-label
                for="current_password"
                :value="__('Senha atual')"
            />

            <x-text-input
                id="current_password"
                name="current_password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="current-password"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('current_password')"
            />
        </div>


        {{-- Nova senha --}}
        <div>
            <x-input-label
                for="password"
                :value="__('Nova senha')"
            />

            <x-text-input
                id="password"
                name="password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('password')"
            />
        </div>


        {{-- Confirmar senha --}}
        <div>
            <x-input-label
                for="password_confirmation"
                :value="__('Confirmar nova senha')"
            />

            <x-text-input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('password_confirmation')"
            />
        </div>


        <div class="flex items-center gap-4">

            <x-primary-button>
                Atualizar senha
            </x-primary-button>


            @if (session('status') === 'password-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-emerald-600"
                >
                    Senha atualizada.
                </p>

            @endif

        </div>

    </form>

</section>