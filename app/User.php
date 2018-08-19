<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Post as PostEloquent;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //0819新增user_id
    protected $fillable = [
        'name', 'email', 'password','users_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post(){
        return $this->hasMany(PostEloquent::class,'authors','users_id');
    }

    public function setPasswordAttribute($password)
    {
        $password = '123123';
        $this->attributes['password'] = bcrypt($password);
    }
}
