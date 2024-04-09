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
        Schema::create('provincial_taxes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->decimal('valeur', 6, 3);
            $table->unsignedBigInteger('provence_id');
            $table->foreign('provence_id')->references('id')->on('provences')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provincial_taxes');
    }
};
