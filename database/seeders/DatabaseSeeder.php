<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::create(['name' => "Admin"]);
         \App\Models\Role::create(['name' => "User"]);
         \App\Models\User::factory(10)->create();
         \App\Models\News::factory(10)->create();
         \App\Models\Post::factory(10)->create();
         \App\Models\Picture::factory(10)->create();
         \App\Models\Tag::factory(10)->create();
         


    }
}
