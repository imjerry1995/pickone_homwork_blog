<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User as UserEloquent;
use App\Comment as CommentEloquent;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'authors', 'title', 'content'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function user(){
        return $this->belongsTo(UserEloquent::class,'authors','users_id');
    }

    public function comment(){
        return $this->hasMany(CommentEloquent::class,'post_id','id');
    }
}
