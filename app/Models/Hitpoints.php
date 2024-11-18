<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hitpoints extends Model
{
    use HasFactory;

    protected $fillable = [
        'personaje_id',
        'base',
        'dano_sufrido',
    ];

    protected $casts = [
        'total_vida' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function personaje()
    {
        return $this->belongsTo(Personaje::class);
    }
}
