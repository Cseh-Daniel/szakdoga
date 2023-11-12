<?php

namespace Database\Factories;

use App\Models\Profession;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    public function definition(): array
    {
        return [

            'user_id' => rand(1, User::count() - 1),
            'title' => "CÍM " . $this->faker->realText(25),
            'text' => "SZÖVEG... " . $this->faker->realText(200),
            'trainee' => rand(0, 1) == 1,
            'profession_id' => rand(1, Profession::count() - 1),
            'year' => rand(2000, 2023),
            'remote' => rand(0, 1) == 1,
            'duration' => rand(0, 500). " ". config('durationTypes')[rand(0, count(config('durationTypes')) - 1)],
            'company' => "CÉG ". $this->faker->realText(10),
            'county_id' => rand(1, 19),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
