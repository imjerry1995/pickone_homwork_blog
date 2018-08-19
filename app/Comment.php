<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Post as PostEloquent;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'content', 'post_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function post(){
        return $this->belongsTo(PostEloquent::class,'post_id','id');
    }
}
