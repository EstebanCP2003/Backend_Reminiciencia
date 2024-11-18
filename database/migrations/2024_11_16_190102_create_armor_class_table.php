<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('armor_class', function (Blueprint $table) {
                $table->id();
                $table->foreignId('personaje_id')->constrained('personajes')->onDelete('cascade');
                $table->enum('tipo', ['bloqueo', 'esquivar']);
                $table->integer('base');
                $table->integer('constitucion');
                $table->integer('items')->default(0);
                $table->integer('total')->storedAs('(base + constitucion + items)');
                $table->timestampsTz();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('armor_class');
    }
};
