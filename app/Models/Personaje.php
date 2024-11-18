<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Personaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nivel',
        'altura',
        'usuario_id',
    ];

    protected $casts = [
        'altura' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function jugadores()
    {
        return $this->belongsTo(Jugadores::class);
    }
}
