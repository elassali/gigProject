<?php

namespace Database\Factories;

use App\Models\userRole;
use Illuminate\Database\Eloquent\Factories\Factory;

class userRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = userRole::class;
    public function definition()
    {
        return [
            'user_id' => random_int(1,50),
            'role_id' => 1
        ];
    }
}
