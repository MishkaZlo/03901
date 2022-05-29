<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mark' => $this->faker->randomElement(['audi', 'opel', 'ford', 'lada', 'nissan']),
            'model' => $this->faker->randomElement(['sedan1', 'hatchback1', 'sedan2', 'hatchback2', 'crossover']),
            'number' => $this->getRandomCarNumber(),
        ];
    }

    /**
     * @return string
     */
    private function getRandomCarNumber(): string
    {
        $numberPrefix = $this->faker->randomElement(['а', 'в', 'у', 'к', 'м', 'н', 'о']);
        $numberDigits = implode('', $this->faker->randomElements(['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'], 3, true));
        $numberPostfix = implode('', $this->faker->randomElements(['а', 'в', 'у', 'к', 'м', 'н', 'о'], 2, true));

        return $numberPrefix . $numberDigits . $numberPostfix;
    }
}
