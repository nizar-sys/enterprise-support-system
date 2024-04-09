<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApprovalTat>
 */
class ApprovalTatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tat_id' => 1,
            'tahun_lulus' => $this->faker->year(),
            'email' => $this->faker->email(),
            'telepon' => $this->faker->phoneNumber(),
        ];
    }
}
