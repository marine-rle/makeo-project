<?php

namespace Database\Factories;

use App\Models\Competence;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Competence>
 */
class CompetenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Competence::class;

    public function definition()
    {
        return [
            // 'name' => $this->faker->unique()->randomElement(['HTML', 'CSS', 'Laravel', 'Symfony', 'Angular', 'PHP', 'Bootstrap']),
        ];
    }
}



