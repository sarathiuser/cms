<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::find(1);

        Page::truncate();

        $admin->pages()->saveMany([
            new Page([
                'title' => 'About',
                'url' => '/about',
                'content' => 'This is about us',
            ]),
            new Page([
                'title' => 'Contact',
                'url' => '/contact',
                'content' => 'You can Contact us',
            ]),
        ]);
    }
}
