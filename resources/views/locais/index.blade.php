@extends('layouts.app')

@section('title', 'Locais')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Locais</h1>
        <a href="{{ route('locais.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700">
            + Novo local
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">Nome</th>
                    <th class="px-4 py-3">Descrição</th>
                    <th class="px-4 py-3">Itens</th>
                    <th class="px-4 py-3 text-right">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($locais as $local)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $local->nome }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $local->descricao ?? '—' }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $local->itens_count }}</td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('locais.edit', $local) }}" class="text-blue-600 hover:underline">Editar</a>
                            <form action="{{ route('locais.destroy', $local) }}" method="POST" class="inline"
                                onsubmit="return confirm('Remover este local?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-400">Nenhum local cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $locais->links() }}
    </div>
@endsection
