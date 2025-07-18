<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CollaboratorRole>
 */
class CollaboratorRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'collaborator_role_id' => $this->faker->unique()->numberBetween(1, 3),
            'name' => $this->faker->randomElement(['colaborador', 'aprendiz', 'freelancer']),
        ];
    }
}
