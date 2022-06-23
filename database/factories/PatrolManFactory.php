<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PatrolManFactory extends Factory
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
            'name'=>$this->faker->name(),
            'code_number'=>Str::random(15),
            'organization_id'=>$array[random_int(0,count($array)-1)],
            'description'=> $this->faker->text(),
        ];
    }
}