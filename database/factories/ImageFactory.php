<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $models = ['App\Models\User','App\Models\Portfolio'];
        return [
            'url' => $this->faker->imageUrl($width = 640, $height = 480),
            'imageable_id' => random_int(1,50),// user id or portfolioid
            'imageable_type' => $models[random_int(0,1)], // for users table or portfolio table
        ];
    }
}
