<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomePage>
 */
class HomePageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'matkul' => $this->faker->randomElement(['Pemrograman Web Lanjut', 'Pemrograman Berbasis Framework', 'Pemrograman Berbasis Mobile']),
            'deskripsi' => $this->faker->text(100),
        ];
    }
}
