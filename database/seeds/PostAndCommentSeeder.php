<?php

use Illuminate\Database\Seeder;

use App\Post as Post;
use App\Comment as Comment;


class PostAndCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = factory(Post::class,1)->create()->each(function($post){
            $post->save();
        });
        $comment = factory(Comment::class,1)->create()->each(function($comment){
            $comment->save();
        });
    }
}
