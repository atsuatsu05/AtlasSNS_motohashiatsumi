<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Auth;
use App\Follow;





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
        // $new_bio = $request->input('bio');

        // 画像の受け取り・保存の仕方
        // ①ファイル形式で受け取り、画像を保存するディレクトリを指定
        // $icon_images = $request->file('images')->store('public');


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

            $icon_images=$request->file('images')->storeAs('',$filename);
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

    //フォロー機能の実装
    // public function followCreate(Request $request){
    //     //フォローしたユーザーのidを受け取る
    //     $follow_id = $request->input('follow_id');
    //     //フォローしたユーザーをfollowテーブルに保存する
    //     Follow::create([
    //         'following_id' => '$follow_id'
    //     ]);

    //     //登録したら、ユーザー検索ページへ戻る
    //     return redirect('/search');
    // }
}
