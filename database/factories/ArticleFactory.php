<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    public function definition(): array
    {
        $category_id = collect(Category::where('type','article')->pluck('id')->toArray());
        $is_active = collect(['0','1']);
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->name(),
            'is_active' => $is_active->random(),
            'category_id' => $category_id->random(),
            'title' => $this->faker->title,
            'body' => $this->faker->text(170),
            'description' => $this->faker->text(50),
            'alt' => $this->faker->text(15),
            'keywords' => $this->faker->text(20),
            'image' => 'https://fakeimg.pl/300',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
