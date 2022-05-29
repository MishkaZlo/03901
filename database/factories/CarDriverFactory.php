<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarDriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startTime = $this->faker->dateTimeBetween('-1 day');
        $endTime = $this->faker->dateTimeBetween('-1 day');

        return [
            'car_id' => $this->faker->numberBetween(1, 10),
            'driver_id' => $this->faker->numberBetween(1, 20),
            'start_time' => $startTime,
            'end_time' => ($endTime > $startTime) ? $endTime : null,
        ];
    }
}
