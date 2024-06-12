<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Tache;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Création de 10 utilisateurs avec chacun 3 projets et chaque projet ayant 5 tâches
        User::factory(5)->create()->each(function ($user) {
            Project::factory(3)->create(['user_id' => $user->id])->each(function ($project) {
                Tache::factory(5)->create(['project_id' => $project->id]);
            });
        });
    }
}
