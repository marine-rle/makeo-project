<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        // Récupérer les ID des statuts existants
        $statutIds = DB::table('statuts')->pluck('id')->toArray();

        return [
            'user_id' => User::factory(),
            'date_demande' => $this->faker->date,
            'statut_id' => $this->faker->randomElement($statutIds),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];
    }
}
