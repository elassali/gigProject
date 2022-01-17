<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OfferdetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'offer_id' => random_int(1,50),
        'profession_id' => random_int(1,15),
        'offer_title' => $this->faker->text($maxNBChars = 50),
        'description' => $this->faker->text,
        'for_price' => random_int(500,1000),
        'for_date' => now()->addDays(random_int(1,10)),
        'expired_at' => now()->addDays(random_int(10,12)),
        ];
    }
    public function expired()
    {
        return $this->state(function (array $attributes) {
            return [
                'expired_at' => now()->subDays(20),
            ];
        });
    }
}