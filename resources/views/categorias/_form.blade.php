<div>
    <label class="block text-sm font-medium mb-1">Nome</label>
    <input type="text" name="nome" value="{{ old('nome', $categoria->nome ?? '') }}"
        class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200" required autofocus>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Descrição</label>
    <textarea name="descricao" rows="3"
        class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200">{{ old('descricao', $categoria->descricao ?? '') }}</textarea>
</div>
