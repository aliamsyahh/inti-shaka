<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    private static $code = 1;
    public function definition(): array
    {
        return [
            'name'  => $this->faker->name(),
            'is_active' => $this->faker->randomElement([0, 1]),
            'description' => $this->faker->paragraph,
            'code'  => 'A000' . self::$code++,
            'created_by' => 'Seeder System',
            'updated_by' => 'Seeder System',
        ];
    }
}
