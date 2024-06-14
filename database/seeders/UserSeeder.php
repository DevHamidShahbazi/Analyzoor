<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        //create user Developer
        User::factory()->count(1)->create([
            'name'=>'حمید شهبازی',
            'phone'=>'09363933499',
            'email'=>'dev.hamidshahbazi@gmail.com',
            'level' => 'Developer',
            'password' => Hash::make('321321'),
            'crypt' => Crypt::encrypt('321321'),
        ]);
    }
}
