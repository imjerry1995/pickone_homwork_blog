<?php

use Illuminate\Database\Seeder;

use App\Post as Post;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = factory(Post::class,5)->create()->each(function($post){
            $post->save();
        });

    }
}
