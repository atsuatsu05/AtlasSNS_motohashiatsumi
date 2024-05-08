<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //下記指定したカラムにのみ、createやupdateが可能となる
    protected $fillable = [
        'post','user_id'
    ];

    //リレーション定義の追加：1対多の「1」に対する記述
    public function user(){
        return $this->belongsTo('App\User');
    }
}
