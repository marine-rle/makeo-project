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
    public function up(): void
    {
        Schema::create('competences', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Insertion des compétences initiales avec les dates actuelles
        DB::table('competences')->insert([
            [
                'name' => 'HTML',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'CSS',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Laravel',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Symfony',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Angular',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'PHP',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bootstrap',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competences');
    }
};
