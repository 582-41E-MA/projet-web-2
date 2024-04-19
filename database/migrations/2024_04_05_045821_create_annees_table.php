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
        Schema::create('annees', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('annee'); 
            $table->timestamps();
        });

        // Insérer les années de 1900 à l'année actuelle
        $currentYear = date('Y');
        $years = [];
        for ($i = 1900; $i <= $currentYear; $i++) {
            $years[] = ['annee' => $i];
        }
        DB::table('annees')->insert($years);
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annees');
    }
};
