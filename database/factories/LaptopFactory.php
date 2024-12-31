<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laptop>
 */
class LaptopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'merk' => $this->faker->randomElement(['Dell', 'HP', 'Asus', 'Lenovo']),
            'model' => $this->faker->word(),
            'processor' => $this->faker->randomElement(['Intel i5', 'Intel i7', 'AMD Ryzen 5']),
            'jenis_ram' => $this->faker->randomElement(['DDR3', 'DDR4']),
            'ukuran_ram' => $this->faker->randomElement(['4GB', '8GB', '16GB']),
            'jenis_storage' => $this->faker->randomElement(['SSD', 'HDD']),
            'ukuran_storage' => $this->faker->randomElement(['256GB', '512GB', '1TB']),
            'gpu' => $this->faker->word(),
            'sistem_operasi' => $this->faker->randomElement(['Windows 10', 'Windows 11', 'iOS']),
            'tipe_laptop' => $this->faker->word(),
            'harga' => $this->faker->numberBetween(10000000, 30000000),
            'views' => $this->faker->numberBetween(0, 200),
            'gambar' => 'default.jpg',
            //
        ];
    }
}
