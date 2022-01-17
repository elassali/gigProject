<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserprofessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $experience = ['beginner','intermediate','expert'];
        return [
            'user_id' => random_int(1,50),
            'profession_id' => random_int(1,10),
            'experience' => $experience[random_int(1,3)-1],
        ];  
    }
}
