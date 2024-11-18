<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ataques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personaje_id')->constrained('personajes')->onDelete('cascade');
            $table->string('caracteristica');
            $table->integer('bonus_item')->default(0);
            $table->integer('habilidad')->default(0);
            $table->integer('total')->storedAs('(bonus_item + habilidad)');
            $table->timestampsTz();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ataques');
    }
};
