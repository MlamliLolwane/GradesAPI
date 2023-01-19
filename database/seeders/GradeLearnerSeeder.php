<?php

namespace Database\Seeders;

use App\Models\GradeLearner;
use Illuminate\Database\Seeder;

class GradeLearnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GradeLearner::factory(3000)->create();
    }
}
