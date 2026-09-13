<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovimentacaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'item_id' => [
                'required',
                'exists:itens,id',
            ],

            'tipo' => [
                'required',
                'in:entrada,saida,transferencia',
            ],

            'quantidade' => [
                'required',
                'integer',
                'min:1',
            ],

            'local_origem_id' => [
                'nullable',
                'exists:locais,id',
            ],

            'local_destino_id' => [
                'nullable',
                'exists:locais,id',
                'different:local_origem_id',
            ],

            'observacao' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'item_id.required' => 'Selecione um item.',
            'item_id.exists' => 'O item selecionado não existe.',

            'tipo.required' => 'Selecione o tipo de movimentação.',
            'tipo.in' => 'O tipo de movimentação deve ser entrada, saída ou transferência.',

            'quantidade.required' => 'Informe a quantidade.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade.min' => 'A quantidade deve ser maior que zero.',

            'local_origem_id.exists' => 'O local de origem selecionado não existe.',

            'local_destino_id.exists' => 'O local de destino selecionado não existe.',
            'local_destino_id.different' => 'O local de destino deve ser diferente do local de origem.',

            'observacao.string' => 'A observação deve ser um texto.',
            'observacao.max' => 'A observação não pode ultrapassar 1000 caracteres.',
        ];
    }
}