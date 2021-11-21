<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(100)->create();

        $users = User::all();

        Post::all()->each(function ($post) use ($users) {
            $post->users()->attach(
                $users->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
