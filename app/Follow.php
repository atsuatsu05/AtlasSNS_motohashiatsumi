<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
     protected $fillable = [
        'following_id', 'followed_id'
     ];

     //リレーション定義の追加：多対多に対する記述
     public function users(){
        return $this->belongsToMany('App\User');
     }
}
