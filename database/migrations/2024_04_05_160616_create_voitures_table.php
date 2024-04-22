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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marque_id');
            $table->unsignedBigInteger('modele_id');
            $table->unsignedBigInteger('annee_id');
            $table->unsignedBigInteger('transmission_id');
            $table->unsignedBigInteger('traction_id');
            $table->unsignedBigInteger('carburant_id');
            $table->unsignedBigInteger('carrosserie_id');
            $table->unsignedBigInteger('proprietaire');
            $table->timestamp('date_arrive')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('prix_paye', 10, 2);
            $table->decimal('prix_vente', 10, 2);
            $table->boolean('disponible')->default(true);
            $table->unsignedBigInteger('commande_id')->nullable();
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('set null');
            $table->foreign('marque_id')->references('id')->on('marques')->onDelete('cascade');
            $table->foreign('modele_id')->references('id')->on('modeles')->onDelete('cascade');
            $table->foreign('annee_id')->references('id')->on('annees')->onDelete('cascade');
            $table->foreign('transmission_id')->references('id')->on('transmissions')->onDelete('cascade');
            $table->foreign('traction_id')->references('id')->on('tractions')->onDelete('cascade');
            $table->foreign('carburant_id')->references('id')->on('carburants')->onDelete('cascade');
            $table->foreign('carrosserie_id')->references('id')->on('carrosseries')->onDelete('cascade');
            $table->foreign('proprietaire')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
