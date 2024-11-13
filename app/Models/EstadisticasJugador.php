<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EstadisticasJugador extends Model
{
    use HasFactory;

    protected $table = 'estadisticas_jugador';  // Nombre de la tabla
    public $timestamps = false;  // Desactiva timestamps si no tienes created_at y updated_at

    protected $fillable = [
        'nombre',
        'nivel',
        'altura',
        'bloqueo_base',
        'bloqueo_constitucion',
        'bloqueo_item',
        'esquivar_base',
        'esquivar_destreza',
        'esquivar_item',
        'fuerza',
        'destreza',
        'constitucion',
        'inteligencia',
        'sabiduria',
        'apariencia',
        'estima',
        'balance',
        'resistencia',
        'conocimiento',
        'f_voluntad',
        'carisma',
        'musculatura',
        'punteria',
        'salud',
        'logica',
        'nutricio',
        'verborrea',
    ];
}
