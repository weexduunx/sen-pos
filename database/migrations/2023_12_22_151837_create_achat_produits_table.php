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
        Schema::create('achat_produits', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->date('dateAchat');
            $table->integer('prixAchat');
            $table->date('datePeremprion');
            $table->foreignId('fournisseur_id')->constrained();
            $table->foreignId('produit_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achat_produits');
    }
};
