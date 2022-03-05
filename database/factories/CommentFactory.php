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
        // $models = ['App\Models\User','App\Models\Portfolio'];
        return [
            'comment' => $this->faker->text,
            'commentable_id' => random_int(1,20),// user id or portfolio id
            'commentable_type' => 'App\Models\User',// for users table or portfolio table
            'review_score' => random_int(1,5),
            'portfolio_id' => random_int(1,20) // for whom this comment is made
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
