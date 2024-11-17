<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ataque extends Model
{
    use HasFactory;

    protected $fillable = [
        'personaje_id',
        'caracteristica',
        'bonus_item',
        'habilidad',
    ];

    protected $casts = [
        'total' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function personaje()
    {
        return $this->belongsTo(Personaje::class);
    }
}
