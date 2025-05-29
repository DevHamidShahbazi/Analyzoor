<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Episode>
 */
class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => \App\Models\Course::inRandomOrder()->first()->id,
            'time' => $this->faker->time(),
            'name' => $this->faker->word,
            'file' => 'https://picsum.photos/300',
            'video' => 'https://picsum.photos/300',
            'type' => $this->faker->randomElement(config('static_array.episodeType')),
            'title' => $this->faker->title,
            'description' => $this->faker->paragraph,
            'keywords' => implode(', ', $this->faker->words(5)),
            'body' => $this->faker->text(500),
        ];
    }
}
