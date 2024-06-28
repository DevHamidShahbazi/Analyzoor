<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{

    public function definition(): array
    {
        $parent = collect(['0']);
        $type = collect(['article','tool','course']);
        return [
            'name' => $this->faker->name(),
            'type' => $type->random(),
            'slug' => $this->faker->name(),
            'parent_id' => $parent->random(),
            'title' => $this->faker->title,
            'description' => $this->faker->text(50),
            'alt' => $this->faker->text(15),
            'keywords' => $this->faker->text(20),
            'image' => 'https://fakeimg.pl/300/',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
