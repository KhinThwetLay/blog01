<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Blog;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::truncate();
         Category::truncate();
         Blog::truncate();
        \App\Models\User::factory()->create();
       
        $frontend=Category::create([
            'name' => 'frontend',
            'slug' => 'frontend'
        ]);
        $backend=Category::create([
            'name' => 'backend',
            'slug' => 'backend'
        ]);
        Blog::create([
            'title' => 'frontend post',
            'slug' => 'frontend-post',
            'intro' => 'this is intro',
            'body' => 'this is body',
            'category_id' => $frontend->id
        ]);
        Blog::create([
            'title' => 'backend post',
            'slug' => 'backend-post',
            'intro' => 'this is intro',
            'body' => 'this is body',
            'category_id' => $backend->id
        ]);
    }
    
}
