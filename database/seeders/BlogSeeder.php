<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class BlogSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Site Administrator']
        );

        $titles = [
            'Learning Laravel',
            'Understanding Eloquent',
            'Getting Started with PHP',
        ];

        foreach ($titles as $title) {
            Post::updateOrCreate(
                ['slug' => str()->slug($title)],
                [
                    'title' => $title,
                    'user_id' => $user->id,
                    'published' => true,
                    'excerpt' => 'A short introduction to Laravel.',
                    'body' => 'This post explains Laravel fundamentals...',
                ]
            );
        }
    }
}
