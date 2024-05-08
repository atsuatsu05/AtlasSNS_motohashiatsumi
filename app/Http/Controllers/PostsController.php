<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Auth;
use App\Post;



class PostsController extends Controller
{
    //
    public function index(){
        $user = Auth::user(); //ログイン認証しているユーザーの取得
        $username = Auth::user()->username;//現在認証しているユーザー名を取得
        $images = Auth::user()->images;

        //postテーブルに保存した投稿を表示する処理
        $list = Post::get()->sortByDesc('created_at');//Postモデル（postsテーブル）からレコード情報を取得
        return view('posts.index',['list'=>$list]);
    }

    // 投稿の作成
    public function postCreate(PostRequest $request)
    {
        //投稿フォームの内容を受け取る
        $post = $request->input('newPost');
        $user_id = Auth::user()->id;

        //投稿内容をデータベースに保存する処理
        Post::create([
            'post' => $post,
            'user_id' => $user_id]);
        return redirect('/top');
    }

    //投稿の編集モーダル画面
    public function postUpdate(Request $request)
    {
        //編集内容を受け取る
        $up_post = $request->input('upPost');
        $post_id = $request->input('postId');
        // dd($post_id);

        //編集内容をデータベースに保存する処理
        Post::where('id',$post_id)->update([
            'post' => $up_post
        ]);

        return redirect('/top');
    }

    //投稿の削除
    public function delete($id)
    {
        Post::where('id',$id)->delete();
        return redirect('/top');
    }

    //フォローしているユーザーの投稿を表示
    public function show(){
        //postモデル経由でpostsテーブルのレコードを取得
        $posts = Post::get();
        return view('follows.followList',compact('posts'));
    }
}
