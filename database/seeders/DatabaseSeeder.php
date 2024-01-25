<?php

namespace Database\Seeders;


use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            PagesTableSeeder::class,
            PostsTableSeeder::class
        ]);
    }
}
