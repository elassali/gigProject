<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => random_int(1,50),
            'score' => random_int(10,100),
            'profession_id' =>random_int(1,10)
        ];
    }
}
