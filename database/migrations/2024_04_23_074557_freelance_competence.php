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
        Schema::create('freelance_competences', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('freelance_id'); // Utilisation de unsignedBigInteger pour référencer la clé primaire de la table projects
            $table->foreign('freelance_id')->references('id')->on('freelances'); // Définition de la contrainte de clé étrangère

            $table->unsignedBigInteger('id_competences');
            $table->foreign('id_competences')->references('id')->on('competences');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('freelance_competences', function (Blueprint $table) {
            Schema::dropIfExists('freelance_competences');
        });
    }
};
