<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RestrictedaccountFactory extends Factory
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
            'restriction_reason' => $this->faker->text($maxNbChars = 100),
            'description' => $this->faker->text(),
            'restricted_at' => now() 
        ];
    }
}
