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
        Schema::create('freelance_projects', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('freelance_id'); // Utilisation de unsignedBigInteger pour référencer la clé primaire de la table projects
            $table->foreign('freelance_id')->references('id')->on('freelances'); // Définition de la contrainte de clé étrangère

            $table->unsignedBigInteger('project_id'); // Utilisation de unsignedBigInteger pour référencer la clé primaire de la table projects
            $table->foreign('project_id')->references('id')->on('projects'); // Définition de la contrainte de clé étrangère

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('freelance_projects', function (Blueprint $table) {
            Schema::dropIfExists('freelance_projects');
        });
    }
};
