<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TopikTugasAkhir>
 */
class TopikTugasAkhirFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->word(),
            'kouta' => $this->faker->randomNumber(),
            'objek' => $this->faker->word(),
            'publisher' => $this->faker->name(),
        ];
    }
}
