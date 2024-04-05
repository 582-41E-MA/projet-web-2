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
        Schema::create('provences', function (Blueprint $table) {
            $table->id();
            $table->json('nom');
            $table->unsignedBigInteger('pays_id');
            $table->foreign('pays_id')->references('id')->on('pays')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provences');
    }
};
