<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::find(1);

        Post::truncate();

        $admin->pages()->saveMany([
            new Post([
                'title'=>'Blog Post 1',
                'slug'=>'blog-post-1',
                'excerpt'=>'Blog Post 1 excerpt',
                'body'=>'This is first blog post',
            ]),
            new Post([
                'title'=>'Blog Post 2',
                'slug'=>'blog-post-2',
                'excerpt'=>'Blog Post 2 excerpt',
                'body'=>'This is second blog post',
            ]),
            new Post([
                'title'=>'Blog Post 3',
                'slug'=>'blog-post-3',
                'excerpt'=>'Blog Post 3 excerpt',
                'body'=>'This is third blog post',
            ]),
        ]);
    }
}
