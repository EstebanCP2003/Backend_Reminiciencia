<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugadores extends Model
{
    use HasFactory;

    protected $table = 'jugadores';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];
}
