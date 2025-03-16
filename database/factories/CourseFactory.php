<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => \App\Models\Category::where('type','course')->inRandomOrder()->first()->id,
            'name' => $this->faker->word,
            'status' => $this->faker->randomElement(config('static_array.courseStatus')),
            'type' => $this->faker->randomElement(config('static_array.courseType')),
            'title' => $this->faker->title,
            'price' => $this->faker->numberBetween(),
            'discount' => $this->faker->numberBetween(),
            'description' => $this->faker->paragraph,
            'keywords' => implode(', ', $this->faker->words(5)),
            'body' => $this->faker->text(500),
            'alt' => $this->faker->sentence,
            'image' => 'https://fakeimg.pl/300',
        ];
    }
}
