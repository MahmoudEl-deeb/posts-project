<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph(4),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
