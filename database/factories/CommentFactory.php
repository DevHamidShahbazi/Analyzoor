<?php

namespace Database\Factories;


use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{

    public function definition(): array
    {
        $article_id = collect(Article::get()->pluck('id')->toArray());
        $user_id = collect(User::get()->pluck('id')->toArray())->merge([null]);
        $is_active = collect(['0','1']);

        return [
            'user_id' => $user_id->random(),
            'parent_id' => 0,
            'commentable_id' => $article_id->random(),
            'commentable_type' => Article::class,
            'comment' => $this->faker->text(170),
            'is_active' => $is_active->random(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
