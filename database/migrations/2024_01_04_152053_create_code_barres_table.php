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
        Schema::create('code_barres', function (Blueprint $table) {
            $table->id();
            $table->string('valeur_code_barre'); // Colonne pour stocker la valeur du code-barres
            $table->string('type_code_barre')->nullable(); // Colonne facultative pour le type de code-barres (Code 39, Code 128, etc.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('code_barres');
    }
};
