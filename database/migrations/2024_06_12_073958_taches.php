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
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id'); // Utilisation de unsignedBigInteger pour référencer la clé primaire de la table project
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade'); // Définition de la contrainte de clé étrangère

            $table->date('date');
            $table->integer('duree');


            $table->string('title');
            $table->string('description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('taches', function (Blueprint $table) {
            Schema::dropIfExists('taches');
        });
    }
};
