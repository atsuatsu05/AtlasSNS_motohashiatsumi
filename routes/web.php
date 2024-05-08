<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@post');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ：auth認証済み
Route::middleware('auth')->group(function () {
    Route::get('/top','PostsController@index');
    Route::post('/posts/create','PostsController@postCreate');

    Route::get('/profile','UsersController@profile');

    Route::get('/search','UsersController@search');
    //ユーザー検索機能
    Route::post('/search','UsersController@search');

    //フォロー・フォロワーリスト
    // Route::get('/follow-list','PostsController@index');
    // Route::get('/follower-list','PostsController@index');
    Route::get('/follow-list','FollowsController@followList');
    Route::get('/follower-list','FollowsController@followerList');

    //ログインに成功したらtopページへ
    Route::post('/top', 'Auth\LoginController@login');
    //ログアウト機能
    Route::get('/logout', 'Auth\LoginController@logout');

    //投稿の編集機能
    Route::post('/top','PostsController@postUpdate');
    //投稿の削除機能
    Route::get('/post/{id}/delete','PostsController@delete');

    //プロフィールの編集機能
    Route::get('/profile/update','UsersController@profileUpdate');
    Route::post('/profile/update','UsersController@profileUpdate');

    //フォロー機能
    Route::post('/follow','FollowsController@followCreate');
    //フォロー解除機能
    Route::get('/unfollow','FollowsController@unFollow');
    Route::post('/unfollow','FollowsController@unFollow');

  });
