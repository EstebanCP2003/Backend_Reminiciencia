<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonajeCaracteristica extends Model
{
    use HasFactory;

    protected $fillable = [
        'personaje_id',
        'caracteristica_id',
        'puntos_base',
        'bonificador',
        'bonificador_competencia',
        'bonificador_equipo',
        'se_suma_al_dado',
    ];

    protected $casts = [
        'se_suma_al_dado' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function personaje()
    {
        return $this->belongsTo(Personaje::class);
    }

    public function caracteristica()
    {
        return $this->belongsTo(Caracteristica::class);
    }
}
