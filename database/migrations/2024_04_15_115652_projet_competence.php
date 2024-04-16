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
        Schema::create('projet_competences', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('project_id'); // Utilisation de unsignedBigInteger pour référencer la clé primaire de la table users
            $table->foreign('project_id')->references('id')->on('projects'); // Définition de la contrainte de clé étrangère

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
        Schema::table('projet_competences', function (Blueprint $table) {
            Schema::dropIfExists('projet_competences');
        });
    }
};
