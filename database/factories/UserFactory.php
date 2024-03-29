<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'lastname' => $this->faker->lastName(),
            'username' => $this->faker->userName(),
            'date_of_birth' => $this->faker->dateTimeBetween('1990-01-01-01-01-01','2012-01-01-01-01-01')->format('Y-m-d H:i:s'),
            'phone' => $this->faker->tollFreePhoneNumber(),
            'phone_verified_at' => now(),
            'city'  => $this->faker->city(),            
            'email' => $this->faker->unique()->safeEmail(),
            'about' => $this->faker->realText($maxNbChars = 200),
            'email_verified_at' => now(),
            'last_session' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function suspended()
    {
        return $this->state(function (array $attributes) {
            return [
                'isrestricted' => true,
            ];
        });
    }

    public function isonduty(){
        return $this->state(function (array $attributes){
            return[
                'is_on_duty' => true
            ];
        });
    }
}
