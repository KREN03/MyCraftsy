<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FollowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'parent_id' => $this->faker->unique()->numberBetween(1, 102),
            'child_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
