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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->date('date_de_naissance');
            $table->string('code_postal');
            $table->string('telephone');
            $table->string('courriel')->unique();
            $table->string('mot_de_passe');
            $table->unsignedBigInteger('privilege_id');
            $table->unsignedBigInteger('ville_id');
            $table->foreign('privilege_id')->references('id')->on('privileges')->onDelete('cascade');
            $table->foreign('pays_id')->references('id')->on('pays')->onDelete('cascade');
            $table->foreign('provence_id')->references('id')->on('provences')->onDelete('cascade');
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
