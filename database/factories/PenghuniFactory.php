<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\penghuni>
 */
class PenghuniFactory extends Factory
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
            'usia' => $this->faker->numberBetween(18, 60),
            'status' => $this->faker->randomElement(['Mahasiswa', 'Bekerja']),
            'no_kamar' => $this->faker->numberBetween(1, 100),
            'no_telepon' => $this->faker->phoneNumber(),
        ];
    }
}
