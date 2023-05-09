<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Post::factory(20)->create();
        \App\Models\User::factory(5)->create();

        \App\Models\User::create([
            'name' => "Luthfi Nur Ramadhan",
            'username' => 'izuchii3',
            'email' => "luthfiramadhan.lr55@gmail.com",
            'password' => bcrypt('password')
        ]);

        \App\Models\Category::create([
            'name' => 'Programming',
            'slug' => 'programming',
        ]);
        \App\Models\Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);
        \App\Models\Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
    }
}
