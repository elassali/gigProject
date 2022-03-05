<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment_id' => random_int(1,100),
            'user_id' => random_int(1,30),
            'reply' => $this->faker->text()
        ];
    }
}
