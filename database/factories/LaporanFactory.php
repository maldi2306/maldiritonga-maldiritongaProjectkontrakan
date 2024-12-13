<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\laporan>
 */
class LaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tanggal_pelaporan' => $this->faker->date(),
            'nama_pelapor' => $this->faker->name(),
            'no_kamar' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement(['Kos', 'Kontrakan']),
            'deskripsi' => $this->faker->paragraph(),
        ];
    }
}
