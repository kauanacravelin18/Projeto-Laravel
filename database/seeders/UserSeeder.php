<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Gerente',
            'email' => 'gerente@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'gerente',
        ]);

        User::create([
            'name' => 'Usuário',
            'email' => 'usuario@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'usuario',
        ]);
    }
}