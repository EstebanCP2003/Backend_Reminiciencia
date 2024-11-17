<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personajes_conocidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personaje_id')->constrained('personajes')->onDelete('cascade');
            $table->foreignId('conocido_id')->constrained('personajes')->onDelete('cascade');
            $table->timestampsTz();

            $table->unique(['personaje_id', 'conocido_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personajes_conocidos');
    }
};
