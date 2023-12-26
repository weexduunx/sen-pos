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
        Schema::create('ajustements', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->date('date');
            $table->string('note');
            $table->integer('quantite');
            $table->integer('type')->comment('1 => add , 0 => sub');
            $table->foreignId('produit_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajustements');
    }
};
