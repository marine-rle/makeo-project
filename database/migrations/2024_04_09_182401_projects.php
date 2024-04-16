<?php

use App\Models\Competence;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Utilisation de unsignedBigInteger pour référencer la clé primaire de la table users
            $table->foreign('user_id')->references('id')->on('users'); // Définition de la contrainte de clé étrangère
            $table->date('date_demande');

            $table->unsignedBigInteger('statut_id');
            $table->foreign('statut_id')->references('id')->on('statuts');

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
        Schema::table('projects', function (Blueprint $table) {
            Schema::dropIfExists('projects');
        });
    }
};
