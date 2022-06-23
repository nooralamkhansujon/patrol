<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CheckPoint>
 */
class CheckPointFactory extends Factory
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
            'name'       => $this->faker->name(),
            'code_number'   => $this->faker->name(),
            'organization_id'   => $array[random_int(0,count($array)-1)],
            'description'    => $this->faker->text(),
            'creation_time'  => now()
        ];
    }
}