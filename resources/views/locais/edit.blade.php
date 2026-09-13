@extends('layouts.app')

@section('title', 'Editar local')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Editar local</h1>

    <form action="{{ route('locais.update', $local) }}" method="POST" class="bg-white rounded-lg shadow-sm p-6 space-y-4 max-w-xl">
        @csrf
        @method('PUT')
        @include('locais._form')

        <div class="flex justify-end gap-3 pt-2">
            <a href="{{ route('locais.index') }}" class="px-4 py-2 rounded-md text-sm border border-gray-300 hover:bg-gray-50">Cancelar</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700">Atualizar</button>
        </div>
    </form>
@endsection
