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
        Schema::create('inventaire_has_produits', function (Blueprint $table) {
            $table->id();
            $table->integer('inventaireQuantite');
            $table->integer('etat');
            $table->integer('quantiteReel');
            $table->foreignId('inventaire_id')->constrained();
            $table->foreignId('produit_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaire_has_produits');
    }
};
