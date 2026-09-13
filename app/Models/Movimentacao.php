<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movimentacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'tipo',
        'quantidade',
        'local_origem_id',
        'local_destino_id',
        'user_id',
        'observacao',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function localOrigem(): BelongsTo
    {
        return $this->belongsTo(Local::class, 'local_origem_id');
    }

    public function localDestino(): BelongsTo
    {
        return $this->belongsTo(Local::class, 'local_destino_id');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}