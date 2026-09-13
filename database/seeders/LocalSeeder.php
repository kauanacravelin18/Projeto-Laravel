<?php

namespace Database\Seeders;

use App\Models\Local;
use Illuminate\Database\Seeder;

class LocalSeeder extends Seeder
{
    public function run(): void
    {
        $locais = [
            ['nome' => 'Depósito 1', 'descricao' => 'Depósito principal, térreo'],
            ['nome' => 'Sala 203', 'descricao' => 'Sala administrativa, 2º andar'],
            ['nome' => 'Filial Sul', 'descricao' => 'Unidade da zona sul'],
        ];

        foreach ($locais as $local) {
            Local::create($local);
        }
    }
}