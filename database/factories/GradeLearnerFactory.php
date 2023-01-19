<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GradeLearnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function definition()
    {
        static $learner_id = 1;

        return [
            'grade_id' => $this->faker->numberBetween(1, 6),
            'learner_id' => $learner_id++
        ];
    }
}
