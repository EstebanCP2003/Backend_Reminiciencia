<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personaje_caracteristicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personaje_id')->constrained('personajes')->onDelete('cascade');
            $table->foreignId('caracteristica_id')->constrained('caracteristicas')->onDelete('cascade');
            $table->integer('puntos_base')->default(0);
            $table->integer('bonificador')->default(0);
            $table->integer('bonificador_competencia')->default(0);
            $table->integer('bonificador_equipo')->default(0);
            $table->boolean('se_suma_al_dado')->default(false);
            $table->timestampsTz();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personaje_caracteristicas');
    }
};
