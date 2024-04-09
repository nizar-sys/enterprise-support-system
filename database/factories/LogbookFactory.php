<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Logbook>
 */
class LogbookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bimbingan_id' => 1,
            'progres' => $this->faker->text(),
            'status' => $this->faker->word(),
            'feedback' => $this->faker->text(),
        ];
    }
}
