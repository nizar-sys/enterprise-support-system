<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tugasakhir>
 */
class TugasakhirFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dosen_id' => \App\Models\Lecturer::factory(),
            'topik_id' => \App\Models\TopikTugasAkhir::factory(),
            'bimbingan_id' => \App\Models\Bimbingan::factory(),
            'kelengkapan_id' => \App\Models\KelengkapanTA::factory(),
            'skta_id' => \App\Models\SKTA::factory(),
            'tat_id' => \App\Models\TAT::factory(),
        ];
    }
}
