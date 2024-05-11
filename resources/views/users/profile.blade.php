@extends('layouts.login')

@section('content')
@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="profile_container">
  <div class="user_icon"><img src="{{ 'storage/'.Auth::user()->images }}" width="64" height="64"></div>
   <div class="profile_update">
    {!! Form::open(['url' => '/profile/update','enctype' => 'multipart/form-data']) !!}
    @csrf
    {{ Form::hidden('id',Auth::user()->id) }}

    <div class="update_form">
      <!-- ユーザー名 -->
      <div class="update_block">
      <label for="username">ユーザー名</label>
      <input type="text" name="username" value="{{ Auth::user()->username}}">
      </div> <!-- end update_block -->
      <!-- メールアドレス -->
      <div class="update_block">
      <label for="mail">メールアドレス</label>
      <input type="email" name="mail" value="{{ Auth::user()->mail}}">
      </div> <!-- end update_block -->
      <!-- パスワード -->
      <div class="update_block">
      <label for="password">パスワード</label>
      <input type="password" name="password" value="">
      </div> <!-- end update_block -->
      <!-- パスワード確認 -->
      <div class="update_block">
      <label for="password_confirm">パスワード確認</label>
      <input type="password" name="password_confirmation" value="">
      </div> <!-- end update_block -->
      <!-- 自己紹介 -->
      <div class="update_block">
      <label for="bio">自己紹介</label>
      <input type="text" name="bio" value="{{ Auth::user()->bio}}">
      </div> <!-- end update_block -->
      <!-- アイコン画像 -->
      <div class="update_block">
      <label for="images" class="icon_upload">アイコン画像</label>
      <div class="update_image">
        <label>
      <input type="file" name="images" id="file_button" value="">
      <button id="file_image" type="button">ファイルを選択</button>
      </label>
      <p class="file_name"></p>
      </div>
      </div> <!-- end update_block -->
  </div> <!-- end update_form -->
  <button type="submit" class="btn btn-danger">更新</button>
    {!! Form::close() !!}

  </div> <!-- profile_update -->
</div> <!-- end profile_container -->
@endsection
