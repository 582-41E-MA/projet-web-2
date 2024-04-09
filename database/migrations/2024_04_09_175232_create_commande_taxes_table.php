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
        Schema::create('commande_taxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commande_id');
            $table->unsignedBigInteger('fed_tax_id');
            $table->unsignedBigInteger('prov_tax_id');
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
            $table->foreign('fed_tax_id')->references('id')->on('federal_taxes')->onDelete('cascade');
            $table->foreign('prov_tax_id')->references('id')->on('provincial_taxes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_taxes');
    }
};
