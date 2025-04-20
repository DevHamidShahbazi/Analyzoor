<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Episode;
use App\Models\Message;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            UserSeeder::class,
            MenuSeeder::class,
        ]);
        User::factory(50)->create();
        Message::factory()->count(3)->create();
        Category::factory()->count(10)->create();
        Article::factory()->count(10)->create();
        Course::factory()->count(5)->create();
        Episode::factory()->count(5)->create();
        Chapter::factory()->count(50)->create();
        Comment::factory()->count(150)->create();
        Payment::factory()->count(5)->create();
    }
}
