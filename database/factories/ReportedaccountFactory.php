<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReportedaccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reporter_user_id' => random_int(1,50),
            'reported_user_id' =>random_int(1,50),
            'report_reason' => $this->faker->text($maxNbChars = 100),
            'description' => $this->faker->text(),
        ];
    }
}
