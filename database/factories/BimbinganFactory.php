<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bimbingan>
 */
class BimbinganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'jadwal_id' => \App\Models\Jadwal::factory(),
            'dosen_id' => \App\Models\Lecturer::factory(),
            'status' => $this->faker->word,
            'nama_mahasiswa' => $this->faker->name(),
            'nim' => $this->faker->randomNumber(),
        ];
    }
}
