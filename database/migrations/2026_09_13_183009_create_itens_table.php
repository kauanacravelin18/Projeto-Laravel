<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->foreignId('categoria_id')->constrained('categorias')->cascadeOnDelete();
            $table->foreignId('local_id')->constrained('locais')->cascadeOnDelete();
            $table->integer('quantidade')->default(0);
            $table->string('status')->default('disponivel'); // disponivel, em_uso, manutencao, baixado
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('itens');
    }
};