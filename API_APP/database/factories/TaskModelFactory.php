<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\TaskModel;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskModel>
 */
class TaskModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' =>User::all()->random()->id,
            'name' => $this->faker->unique()->sentence(),
            'description' => $this->faker->text(100),
            'priority' => $this->faker->randomElement(['low', 'medium','high']),
        ];
    }
}
