<?php

namespace Database\Factories;
Use App\Models\Kontrakan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends array<string,mixed>
 */
class kontrakanfactoryFactory extends Factory
{
 
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no' => $this->faker->unique()->randomNumber(3), // Nomor kontrakan unik
            'no_kamar' => $this->faker->numberBetween(1, 50), // Nomor kamar
            'status' => $this->faker->randomElement(['terisi', 'kosong']), // Status: terisi atau kosong
            'keterangan' => $this->faker->randomElement(['kos', 'kontrakan']), // Keterangan: kos atau kontrakan
            'foto' => $this->faker->imageUrl(640, 480, 'cats'), // Foto kontrakan, dapat disesuaikan dengan gambar yang diinginkan
            'harga' => $this->faker->numberBetween(500000, 5000000), // Harga dalam rentang yang wajar
            'deskripsi' => $this->faker->paragraph, // Deskripsi tentang kontrakan
        ];
        
    }
}
