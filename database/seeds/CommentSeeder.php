<?php

use Illuminate\Database\Seeder;

use App\Comment as Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = factory(Comment::class,5)->create()->each(function($comment){
            $comment->save();
        });
    }
}
