<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Follow;
use App\Post;
use App\User;

class FollowsController extends Controller
{
    //
    public function followList(){
        //postモデルを経由し、postsテーブルのレコードを表示
        $posts = Post::get();
        //フォローしているユーザーのidを取得
        $following_id = Auth::user()->following()->pluck('followed_id');
        //Userモデルを経由し、usersテーブルのidを取得
        $following = User::whereIn('id',$following_id)->get();
        //フォローしているユーザーのidを元にpostを取得
        $posts = Post::with('user')->whereIn('user_id',$following_id)->get()->sortByDesc('created_at');

        return view('follows.followList',compact('posts','following'));
    }

    public function followerList(){
        //postモデルを経由し、postsテーブルのレコードを表示
        $posts = Post::get();
        //フォローしているユーザーのidを取得
        $followed_id = Auth::user()->followed()->pluck('following_id');
        //Userモデルを経由し、usersテーブルのidを取得
        $followed = User::whereIn('id',$followed_id)->get();
        //フォローしているユーザーのidを元にpostを取得
        $posts = Post::with('user')->whereIn('user_id',$followed_id)->get()->sortByDesc('created_at');
        return view('follows.followerList',compact('posts','followed'));
    }

//フォロー機能の実装
    public function followCreate(Request $request){
        //フォローしたユーザーのidを受け取る
        $follow_id = $request->input('follow_id');
        //フォローしたユーザーをfollowテーブルに保存する
        Follow::create([
            'following_id' => Auth::id(),
            'followed_id' => $follow_id
        ]);

        //登録したら、ユーザー検索ページへ戻る
        return back();
    }

    //フォロー解除
    public function unFollow(Request $request){
        $followed_id = $request->input('followed_id');

        //削除対象のレコードを検索して削除する
        Follow::where('following_id',Auth::id())->where('followed_id',$followed_id)->delete();
        return back();

    }

}
