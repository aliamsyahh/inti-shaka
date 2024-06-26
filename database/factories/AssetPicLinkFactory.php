<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AssetPicLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pic'  => $this->faker->name(),
            'is_active' => $this->faker->randomElement([0, 1]),
            'created_by' => 'Seeder System',
            'updated_by' => 'Seeder System',
        ];
    }
}
