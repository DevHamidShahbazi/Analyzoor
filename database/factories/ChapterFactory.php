<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;


class ChapterFactory extends Factory
{

    public function definition(): array
    {
        return [
            'course_id' => Course::inRandomOrder()->first()->id ?? Course::factory(),
            'title' => $this->faker->sentence(3),
            'name' => $this->faker->name,
            'sort' => $this->faker->numberBetween(1, 10),
        ];
    }
}
