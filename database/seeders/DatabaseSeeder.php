<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;
use Database\Factories\PostFactory;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // DB::table('users')->truncate();
        // DB::table('posts')->truncate();
    
        // User::factory()->count(10)->create()->each(function($user){

        //     $user->posts()->save(Post::factory()->make());

        // });

        $this->call([UserSeeder::class]);

        // Post::factory()->count(3)->create();
    }
}
