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
        static $grade_id = 1;
        static $learner_id = 1;

        return [
            'grade_id' => $grade_id++,
            'learner_id' => $learner_id++
        ];
    }
}
