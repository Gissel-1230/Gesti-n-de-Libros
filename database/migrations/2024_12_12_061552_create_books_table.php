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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable(false); // Título
            $table->string('author')->nullable(false); // Autor
            $table->string('genre')->nullable(); // Género
            $table->integer('publication_year')->nullable()->unsigned()->check('publication_year >= 1800 AND publication_year <= ' . date('Y')); // Año de publicación
            $table->boolean('available')->default(true); // Disponible
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
