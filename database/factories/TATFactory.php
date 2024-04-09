<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TAT>
 */
class TATFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'nim' => $this->faker->randomNumber(),
            'surat_keterangan_lulus' => $this->faker->word(),
            'tugas_akhir' => $this->faker->word(),
        ];
    }
}
