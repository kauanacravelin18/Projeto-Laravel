<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Item;
use App\Models\Local;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $movel = Categoria::where('nome', 'Móvel')->first();
        $veiculo = Categoria::where('nome', 'Veículo')->first();
        $informatica = Categoria::where('nome', 'Equipamento de informática')->first();

        $deposito = Local::where('nome', 'Depósito 1')->first();
        $sala = Local::where('nome', 'Sala 203')->first();
        $filial = Local::where('nome', 'Filial Sul')->first();

        $itens = [
            [
                'nome' => 'Mesa de escritório',
                'descricao' => 'Mesa em L, cor branca',
                'categoria_id' => $movel->id,
                'local_id' => $sala->id,
                'quantidade' => 12,
                'status' => 'disponivel',
            ],
            [
                'nome' => 'Notebook Dell Latitude',
                'descricao' => 'Notebook corporativo, 16GB RAM',
                'categoria_id' => $informatica->id,
                'local_id' => $deposito->id,
                'quantidade' => 5,
                'status' => 'em_uso',
            ],
            [
                'nome' => 'Fiat Strada',
                'descricao' => 'Veículo utilitário para entregas',
                'categoria_id' => $veiculo->id,
                'local_id' => $filial->id,
                'quantidade' => 1,
                'status' => 'manutencao',
            ],
            [
                'nome' => 'Cadeira giratória',
                'descricao' => 'Cadeira com apoio de braço',
                'categoria_id' => $movel->id,
                'local_id' => $deposito->id,
                'quantidade' => 20,
                'status' => 'disponivel',
            ],
        ];

        foreach ($itens as $item) {
            Item::create($item);
        }
    }
}