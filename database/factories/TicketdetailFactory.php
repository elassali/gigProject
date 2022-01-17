<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TicketdetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ticket_id' => random_int(1,60),
            'ticket_subject' => $this->faker->text($maxNbChars = 50),
            'description' => $this->faker->text($maxNbChars = 200),
        ];
    }
}
