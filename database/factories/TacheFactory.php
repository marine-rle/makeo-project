<?php

namespace Database\Factories;

use App\Models\Tache;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tache>
 */
class TacheFactory extends Factory
{
    protected $model = Tache::class;

    public function definition()
    {
        return [
            'project_id' => Project::factory(),
            'date' => $this->faker->date,
            'duree' => $this->faker->numberBetween(1, 8),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];
    }
}
