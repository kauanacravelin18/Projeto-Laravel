<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovimentacaoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'item_id' => ['required', 'exists:itens,id'],
            'tipo' => ['required', 'in:entrada,saida,transferencia'],
            'quantidade' => ['required', 'integer', 'min:1'],
            'local_origem_id' => ['nullable', 'exists:locais,id'],
            'local_destino_id' => ['nullable', 'exists:locais,id'],
            'observacao' => ['nullable', 'string', 'max:1000'],
        ];
    }
}