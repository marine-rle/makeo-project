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
        Schema::create('freelances', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('description');
            $table->string('username')->unique();
            $table->string('password');
            $table->boolean('admin')->default(false);
            $table->timestamps();
        });

        $passwordHash = Hash::make('A.dmin2004@');

        DB::table('freelances')->insert([
            [
                'name' => 'Xavier',
                'surname' => 'Dupont',
                'description' => 'Développeur et Administrateur',
                'username' => 'XavDupont',
                'password'=> $passwordHash,
                'admin' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('freelances', function (Blueprint $table) {
            Schema::dropIfExists('freelances');
        });
    }
};
