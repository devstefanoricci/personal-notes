<?php

namespace Database\Factories;

use App\Models\User as User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(),
            'image_url' => 'uploads/not-found.jpg',
            'user_id' => User::query()->inRandomOrder()->first()?->id ??
            User::factory(),
        ];
    }
}
