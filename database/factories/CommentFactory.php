<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'user_id' => rand(1, User::count() - 1),
            'Post_id' => rand(1, Post::count() - 1),
            'text' => "Hozzászólás " . $this->faker->realText(150),
            'created_at' => now(),
            'updated_at' => now(),


        ];
    }
}
