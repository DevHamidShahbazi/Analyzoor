<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'name'=>'مقالات',
            'url'=>'/articles',
            'sort'=>'1',
        ]);

        Menu::create([
            'name'=>'دوره های آموزشی',
            'url'=>'/courses',
            'sort'=>'2',
        ]);

    }
}
