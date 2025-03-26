<?php

namespace Database\Factories;


use App\Models\Article;
use App\Models\Course;
use App\Models\Episode;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        $commentable = $this->faker->randomElement([
            Article::class,
            Episode::class,
            Course::class,
        ]);

        $commentableId = $commentable::inRandomOrder()->first()->id;

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'parent_id' => 0,
            'commentable_id' => $commentableId,
            'commentable_type' => $commentable,
            'comment' => $this->faker->text(170),
            'is_active' => collect(['0','1'])->random(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
