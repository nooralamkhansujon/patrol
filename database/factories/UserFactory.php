<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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
        $array = [1,3,4,5,6,7];
        return [
            'name'              => $this->faker->name(),
            'email'             => $this->faker->safeEmail(),
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
            'organization_id'   => $array[random_int(0,count($array)-1)],
            'type'              => 'administrator',
            // 'remember_token'    => Str::random(10),
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
