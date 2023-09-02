<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupDetail>
 */
class GroupDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id'=>$this->faker->numberBetween(1,30),
            'group_id'=>$this->faker->numberBetween(1,7),
            'paid'=>$this->faker->boolean(),
            'removed'=>$this->faker->boolean(),
        ];
    }
}
