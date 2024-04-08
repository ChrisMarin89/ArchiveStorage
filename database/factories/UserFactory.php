<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
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
            'name' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'lang' => 'en',
            'email_verified_at' => now(),
            'password' => bcrypt('Chris.123'), // password
            'remember_token' => Str::random(10),
            'created_by' => 'System',
            'updated_by' => 'System',
        ];
    }
}
