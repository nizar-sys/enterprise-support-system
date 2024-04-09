<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecturer>
 */
class LecturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode_dosen' => $this->faker->word(),
            'nama' => $this->faker->name(),
            'nip' => $this->faker->randomNumber(),
            'email' => $this->faker->email(),
            'telepon' => $this->faker->phoneNumber(),
        ];
    }
}
