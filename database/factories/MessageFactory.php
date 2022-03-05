<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'conversation_id' => random_int(1,20),
            'belongsto' => random_int(1,20),
            'message' => $this->faker->text
        ];
    }
}
