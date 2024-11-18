<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonajeConocido extends Model
{
    use HasFactory;

    protected $table = 'personajes_conocidos';

    protected $fillable = [
        'personaje_id',
        'conocido_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function personaje()
    {
        return $this->belongsTo(Personaje::class, 'personaje_id');
    }

    public function conocido()
    {
        return $this->belongsTo(Personaje::class, 'conocido_id');
    }
}
