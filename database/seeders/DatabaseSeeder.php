<?php

namespace Database\Seeders;
use App\Models\Blog;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**P
     * Seed the application's database.
     */
    public function run(): void
    {
      
        Blog::factory(100)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

    // "App\Model\Blog" === Blog::classPw
 }
