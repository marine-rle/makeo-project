<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('statuts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Insertion des statuts initiaux avec les dates actuelles
        DB::table('statuts')->insert([
            [
                'name' => 'Brouillon',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Envoyé',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'En cours de traitement',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Finie',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuts');
    }
};
