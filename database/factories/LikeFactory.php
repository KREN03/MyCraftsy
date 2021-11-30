<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'work_id' => $this->faker->numberBetween(1, 3),
            'user_id' => $this->faker->unique()->numberBetween(1, 102),
            'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2021-08-01 11:53:20')->addDays(rand(1,120))->addMinutes(rand(0,
            60 * 23))->addSeconds(rand(0, 60)),
        ];
    }
}
