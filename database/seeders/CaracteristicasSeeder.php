<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaracteristicasSeeder extends Seeder
{
    public function run(): void
    {
        $caracteristicas = [
            'FUERZA',
            'DESTREZA',
            'CONSTITUCION',
            'INTELIGENCIA',
            'SABIDURIA',
            'APARIENCIA',
            'ESTAMINA',
            'BALANCE',
            'RESISTENCIA',
            'CONOCIMIENTO',
            'F. VOLUNTAD',
            'CARISMA',
            'MUSCULATURA',
            'PUNTERIA',
            'SALUD',
            'LOGICA',
            'INTUICION',
            'VERBORREA',
        ];

        foreach ($caracteristicas as $caracteristica) {
            DB::table('caracteristicas')->insert([
                'nombre' => $caracteristica,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

