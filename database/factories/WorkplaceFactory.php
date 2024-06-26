<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WorkplaceFactory extends Factory
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
            'contact_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'is_active' => $this->faker->randomElement([0, 1]),
            'created_by' => 'Seeder System',
            'updated_by' => 'Seeder System',
        ];
    }
}
