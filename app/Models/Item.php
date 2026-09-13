<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $table = 'itens';

    protected $fillable = [
        'nome',
        'descricao',
        'categoria_id',
        'local_id',
        'quantidade',
        'status',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function local(): BelongsTo
    {
        return $this->belongsTo(Local::class);
    }

    public function movimentacoes(): HasMany
    {
        return $this->hasMany(Movimentacao::class)->latest();
    }
}