<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => $this->faker->imageUrl(800, 600, 'houses'), // Génère une URL d'image aléatoire
            'house_id' => $this->faker->numberBetween(1, 2), // L'ID d'une maison existante

        ];
    }
}