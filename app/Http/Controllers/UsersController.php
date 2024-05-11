<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Auth;
use App\Follow;
use App\Post;





class UsersController extends Controller
{

    public function profile(){
        return view('users.profile');
    }

    //プロフィールの編集
    //バリデーションはフォーム編集機能ができてから修正する！
    public function profileUpdate(ProfileRequest $request){
        //プロフィールの編集内容を受け取る
        $user_id = $request->input('id');
        $new_username = $request->input('username');
        $new_mail = $request->input('mail');
        $new_password = $request->input('password');
        $password_confirm = $request->input('password_confirm');



        //編集内容をデータベース（Userテーブル）へ保存する
        User::where('id',$user_id)->update([
            'username' => $new_username,
            'mail' => $new_mail,
            'password' => bcrypt($new_password),
        ]);
          if($request->input('bio')){
            $new_bio=$request->input('bio');
            User::where('id',$user_id)->update([
                'bio' => $new_bio
            ]);
            }
         if($request->file('images')){
           //画像にオリジナルの名前をつける
            $filename=$request->file('images')->getClientOriginalName();
            //受け取った画像を指定したディレクトリに指定した名前で保存
            $icon_images=$request->file('images')->storeAs('',$filename,'public');

            User::where('id',$user_id)->update([
                'images' => $icon_images // userテーブルのimagesカラムに格納
            ]);




            }

        //保存したらTOPページへ遷移する
        return redirect('/top');

    }

    //ユーザー検索機能の実装
    public function search(Request $request){
        //キーワードを受け取る
        $keyword = $request->input('keyword');
        //キーワードが入っていたら、usersテーブルからあいまい検索をし、該当のユーザーを取得する
        if(!empty($keyword)){
            $users = User::where('username','like','%'.$keyword.'%')->get();
        }else{
            $users = User::all();
        }

        return view('users.search',compact('users','keyword'));
    }

    //他ユーザーのプロフィール画面
    public function userProfile($id){
        //Userモデルを経由し、usersテーブルのレコードを取得。
        $users_profile = User::where('id',$id)->get();
        $posts = Post::where('user_id',$id)->get();

        //
        return view('users.userProfile',compact('users_profile','posts'));
    }

    //フォロー機能の実装(他ユーザープロフィール画面)
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

    //フォロー解除(他ユーザープロフィール画面)
    public function unFollow(Request $request){
        $followed_id = $request->input('followed_id');

        //削除対象のレコードを検索して削除する
        Follow::where('following_id',Auth::id())->where('followed_id',$followed_id)->delete();
        return back();

    }
}
