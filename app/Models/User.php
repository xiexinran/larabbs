<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','introduction','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function topics()
    {
        // 用户与话题之间是一对多的关系，用hasmany（）方法进行关联
        // 关联成功，可用$user->topics来获取用户发布的所有话题数据
        return $this->hasMany(Topic::class);
    }
}
