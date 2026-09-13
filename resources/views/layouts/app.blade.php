<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Almoxarifado')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 antialiased">
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between flex-wrap gap-3">
            <a href="{{ route('itens.index') }}" class="font-semibold text-lg">Almoxarifado</a>
            <div class="flex gap-5 text-sm">
                <a href="{{ route('categorias.index') }}" class="hover:text-blue-600 {{ request()->routeIs('categorias.*') ? 'text-blue-600 font-medium' : 'text-gray-600' }}">Categorias</a>
                <a href="{{ route('locais.index') }}" class="hover:text-blue-600 {{ request()->routeIs('locais.*') ? 'text-blue-600 font-medium' : 'text-gray-600' }}">Locais</a>
                <a href="{{ route('itens.index') }}" class="hover:text-blue-600 {{ request()->routeIs('itens.*') ? 'text-blue-600 font-medium' : 'text-gray-600' }}">Itens</a>
                <a href="{{ route('movimentacoes.index') }}" class="hover:text-blue-600 {{ request()->routeIs('movimentacoes.*') ? 'text-blue-600 font-medium' : 'text-gray-600' }}">Movimentações</a>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-8">
        @if (session('success'))
            <div class="mb-4 rounded-md bg-green-50 border border-green-200 text-green-700 px-4 py-3 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 rounded-md bg-red-50 border border-red-200 text-red-700 px-4 py-3 text-sm">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 rounded-md bg-red-50 border border-red-200 text-red-700 px-4 py-3 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
