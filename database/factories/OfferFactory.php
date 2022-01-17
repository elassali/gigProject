<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
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
        ];
    }

    public function completed()
    {
        return $this->state(function (array $attributes) {
            return [
                'offer_status' => true,
            ];
        });
    }
}
