<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tumbuhan>
 */
class TumbuhanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => fake()->sentence(),
            'nama_ilmiah' => fake()->sentence(),
            'stok' => mt_rand(1,10),
            'harga' => fake()->randomNumber(5,true),
            'deskripsi' => fake()->paragraph(),
            'category_id' => fake()->unique()->randomDigit()
        ];
    }
}
