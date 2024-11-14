<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logueo extends Model
{
    use HasFactory;

    protected $table = 'logueo';

    protected $fillable = [
        'jugador_id',
        'rol',
        'estado',
    ];

    public function jugador()
    {
        return $this->belongsTo(Jugadores::class, 'jugador_id');
    }
}
