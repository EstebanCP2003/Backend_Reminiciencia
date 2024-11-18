<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArmorClass extends Model
{
    use HasFactory;

    protected $table = 'armor_class';

    protected $fillable = [
        'personaje_id',
        'tipo',
        'base',
        'constitucion',
        'items',
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
