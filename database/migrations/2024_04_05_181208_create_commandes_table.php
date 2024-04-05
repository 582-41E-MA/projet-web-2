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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voiture_id');
            $table->unsignedBigInteger('utilisateur_id');
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('statut_id');
            $table->unsignedBigInteger('taxe_id');
            $table->unsignedBigInteger('acheteur');
            $table->unsignedBigInteger('expedition_id');
            $table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('quantite');
            $table->decimal('prix', 10, 2);
            $table->foreign('voiture_id')->references('id')->on('voitures')->onDelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
            $table->foreign('statut_id')->references('id')->on('statuts')->onDelete('cascade');
            $table->foreign('expedition_id')->references('id')->on('expeditions')->onDelete('cascade');
            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
