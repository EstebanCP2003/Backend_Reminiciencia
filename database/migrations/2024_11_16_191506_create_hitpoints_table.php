<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('hitpoints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personaje_id')->constrained('personajes')->onDelete('cascade');
            $table->integer('base');
            $table->integer('dano_sufrido')->default(0); 
            $table->integer('total_vida')->storedAs('(base - dano_sufrido)');
            $table->timestampsTz();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hitpoints');
    }
};
