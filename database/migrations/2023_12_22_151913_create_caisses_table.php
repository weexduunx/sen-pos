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
        Schema::create('caisses', function (Blueprint $table) {
            $table->id();
            $table->dateTime('dateOuverture');
            $table->dateTime('dateFermeture')->nullable();
            $table->integer('montantOuverture');
            $table->integer('montantFermeture')->nullable();
            $table->integer('etat')->default(1)->comment('1 => ouvert , 0 => fermée');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caisses');
    }
};
