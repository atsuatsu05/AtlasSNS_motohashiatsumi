<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User
as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password','bio','images'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //リレーション定義の追加：１対多の「多」に対する記述
    public function posts(){
        return $this->hasMany('App\Post');
    }

    //リレーション定義の追加：多対多（中間テーブルfollowテーブル）
    //フォローしているユーザー
    public function following(){
        return $this->belongsToMany('App\User', 'follows','following_id','followed_id');
    }

    //フォローされているユーザー
    public function followed(){
        return $this->belongsToMany('App\User', 'follows','followed_id','following_id');
        }

    // フォローしてるかのチェック
    public function isFollowing(Int $user_id){
        return(boolean)$this->following()->where('followed_id',$user_id)->first(['follows.id']);
    }
    //フォローされているかのチェック
    public function isFollowed(Int $user_id){
        return(boolean)$this->followed()->where('following_id',$user_id)->first(['follows.id']);
    }
}
