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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->date('date_de_naissance');
            $table->string('code_postal');
            $table->string('telephone');
            $table->string('courriel')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mot_de_passe');
            $table->rememberToken();
            $table->unsignedBigInteger('privilege_id');
            $table->unsignedBigInteger('ville_id');
            $table->foreign('privilege_id')->references('id')->on('privileges')->onDelete('cascade');
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('courriel')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
