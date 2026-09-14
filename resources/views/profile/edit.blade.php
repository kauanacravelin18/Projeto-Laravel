@extends('layouts.app')

@section('title', 'Perfil')

@section('content')

    {{-- Cabeçalho --}}
    <div class="mb-6">

        <h1 class="text-3xl font-extrabold tracking-wide text-slate-800">
            PERFIL
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Gerencie suas informações pessoais, senha e conta
        </p>

    </div>


    <div class="space-y-6">

        {{-- Informações do perfil --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-5 py-4 border-b border-slate-200">
                <h2 class="text-base font-semibold text-slate-800">
                    Informações do perfil
                </h2>

                <p class="text-sm text-slate-500 mt-0.5">
                    Atualize seu nome e endereço de e-mail.
                </p>
            </div>

            <div class="p-5">
                <div class="max-w-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

        </div>


        {{-- Alterar senha --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-5 py-4 border-b border-slate-200">
                <h2 class="text-base font-semibold text-slate-800">
                    Alterar senha
                </h2>

                <p class="text-sm text-slate-500 mt-0.5">
                    Mantenha sua conta protegida utilizando uma senha segura.
                </p>
            </div>

            <div class="p-5">
                <div class="max-w-2xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

        </div>


        {{-- Excluir conta --}}
        <div class="bg-white rounded-xl border border-red-100 shadow-sm overflow-hidden">

            <div class="px-5 py-4 border-b border-red-100">
                <h2 class="text-base font-semibold text-red-600">
                    Excluir conta
                </h2>

                <p class="text-sm text-slate-500 mt-0.5">
                    Exclua permanentemente sua conta e todos os dados associados.
                </p>
            </div>

            <div class="p-5">
                <div class="max-w-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>

    </div>

@endsection