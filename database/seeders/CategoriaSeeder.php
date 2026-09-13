<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nome' => 'Móvel', 'descricao' => 'Mesas, cadeiras, armários e similares'],
            ['nome' => 'Imóvel', 'descricao' => 'Salas, prédios e terrenos'],
            ['nome' => 'Veículo', 'descricao' => 'Carros, motos e outros veículos'],
            ['nome' => 'Equipamento de informática', 'descricao' => 'Computadores, monitores, periféricos'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}