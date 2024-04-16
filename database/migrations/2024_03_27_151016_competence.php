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
        Schema::create('competences', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('competences')->insert([
            ['name' => 'HTML'],
            ['name' => 'CSS'],
            ['name' => 'Laravel'],
            ['name' => 'Symfony'],
            ['name' => 'Angular'],
            ['name' => 'PHP'],
            ['name' => 'Bootstrap'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('competences', function (Blueprint $table) {
            Schema::dropIfExists('competences');
        });
    }
};
