<?php

use Illuminate\Database\Seeder;

use App\User as UserEloquent;
use App\Post as PostEloquent;
use App\Comment as CommentEloquent;

class RootUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = UserEloquent::create([
            'name' => 'Jerry',
            'email'=> 'dragonryu09@gmail.com',
            'password' => '123',
            'users_id' => 'jerrryweng'
        ]);

        $post = PostEloquent::create([
            'authors'=> $user->user_id,
            'title'=> '製作部落格GOGOGO',
            'content'=>'衝啊衝啊GOGOGO'
        ]);

        $comment = CommentEloquent::create([
            'name' => '我是訪客',
            'content'=> '棒喔',
            'post_id' => $post->id
        ]);
    }
}
