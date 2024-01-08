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
        Schema::table('code_barres', function (Blueprint $table) {
            $table->string('barcode_chemin_img')->nullable()->after('type_code_barre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('code_barres', function (Blueprint $table) {
            //
        });
    }
};
