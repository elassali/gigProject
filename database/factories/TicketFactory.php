<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ticket_id' => Str::random(15),
            'user_id' => random_int(1,50),

        ];
    }
    public function solved()
    {
        return $this->state(function (array $attributes) {
            return [
                'ticket_status' => true,
            ];
        });
    }
    
}
