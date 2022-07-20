<?php

namespace Database\Factories;

use Faker\Provider\pt_BR\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker_br = new Person($this->faker);
        return [
            'name' => $this->faker->name(),
            'login' => $this->faker->userName(),
            'cpf' => str_replace(['.', '-'], '', $faker_br->cpf()),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'profile_id' => 1,
            'password' => Hash::make('123456'), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
