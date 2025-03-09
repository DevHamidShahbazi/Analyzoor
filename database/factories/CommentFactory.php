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
        $article_id = collect(Article::get()->pluck('id')->toArray());
        $episode_id = collect(Episode::get()->pluck('id')->toArray());
        $course_id = collect(Course::get()->pluck('id')->toArray());
        $user_id = collect(User::get()->pluck('id')->toArray());
        $is_active = collect(['0','1']);

        return [
            'user_id' => $user_id->random(),
            'parent_id' => 0,
            'commentable_id' => $this->faker->randomElement([$article_id->random(), $episode_id->random(), $course_id->random()]),
            'commentable_type' => $this->faker->randomElement([Article::class, Episode::class, Course::class]),
            'comment' => $this->faker->text(170),
            'is_active' => $is_active->random(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
