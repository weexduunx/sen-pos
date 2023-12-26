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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nomProduit');
            $table->text('description')->nullable();
            $table->integer('prixAchat');
            $table->integer('prixVente');
            $table->string('codeBar');
            $table->integer('quatite');
            $table->string('image')->nullable();
            $table->integer('alertStock');
            $table->foreignId('categorie_id')->constrained();
            $table->unsignedBigInteger('sousCategorie_id')->nullable();
            $table->foreign('sousCategorie_id')->references('id')->on('sous_categories');
            $table->string('marqueProduit')->nullable();
            $table->foreignId('unit_id')->constrained();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
