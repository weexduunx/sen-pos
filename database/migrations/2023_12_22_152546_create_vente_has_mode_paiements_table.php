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
        Schema::create('vente_has_mode_paiements', function (Blueprint $table) {
            $table->id();
            $table->integer('montant');
            $table->foreignId('vente_id')->constrained();
            $table->foreignId('modePaiement_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vente_has_mode_paiements');
    }
};
