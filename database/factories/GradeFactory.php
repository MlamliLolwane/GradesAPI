<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'grade_number' => $this->faker->numberBetween(1, 6),
            'grade_suffix' => $this->faker->randomElement(['A', 'B', 'C', 'D'])
        ];
    }
}
