<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
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
            'comment' => $this->faker->text,
            'commentable_id' => random_int(1,20),// user id or portfolioid
            'commentable_type' => $models[random_int(0,1)],// for users table or portfolio table
        ];
    }
    public function verified(){
        return $this->state(function (array $attributes){
            return[
                'isverified' => true
            ];
        });
    }
}
