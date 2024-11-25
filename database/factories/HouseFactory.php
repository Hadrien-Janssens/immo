<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\House>
 */
class HouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), // Exemple : "Maison à Paris"
            'price' => $this->faker->randomFloat(2, 50000, 500000), // Prix entre 50k et 500k
            'address' => $this->faker->address,
            'bedrooms' => $this->faker->numberBetween(1, 10),
            'size' => $this->faker->randomFloat(2, 50, 500), // Taille entre 50m² et 500m²
            'description' => $this->faker->paragraph(3), // Une description détaillée
        ];
    }
}