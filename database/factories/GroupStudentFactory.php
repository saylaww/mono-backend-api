<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupStudent>
 */
class GroupStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_id'=>$this->faker->numberBetween(1,7),
            'student_id'=>$this->faker->numberBetween(1,30),
        ];
    }
}
