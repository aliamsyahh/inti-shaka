<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'address' => $this->faker->address(),
            'npwp' => $this->faker->unique()->buildingNumber(),
            'is_active' => $this->faker->randomElement([0, 1]),
            'created_by' => 'Seeder System',
            'updated_by' => 'Seeder System',
        ];
    }
}
