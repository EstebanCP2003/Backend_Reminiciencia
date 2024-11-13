<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estadisticas_jugador', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('nivel');
            $table->integer('altura');
            $table->integer('bloqueo_base');
            $table->integer('bloqueo_constitucion');
            $table->integer('bloqueo_item');
            $table->integer('esquivar_base');
            $table->integer('esquivar_destreza');
            $table->integer('esquivar_item');
            $table->integer('fuerza');
            $table->integer('destreza');
            $table->integer('constitucion');
            $table->integer('inteligencia');
            $table->integer('sabiduria');
            $table->integer('apariencia');
            $table->integer('estima');
            $table->integer('balance');
            $table->integer('resistencia');
            $table->integer('conocimiento');
            $table->integer('f_voluntad');
            $table->integer('carisma');
            $table->integer('musculatura');
            $table->integer('punteria');
            $table->integer('salud');
            $table->integer('logica');
            $table->integer('nutricion');
            $table->integer('verborrea');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estadisticas_jugador');
    }
};
