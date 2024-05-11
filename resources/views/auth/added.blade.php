@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="text">
   <div>
   <p>{{ session('username') }}さん<br>
   ようこそ！AtlasSNSへ！</p>
   </div>

   <p>ユーザー登録が完了しました。<br>
   早速ログインをしてみましょう。</p>
  </div>

  <div class="btn btn-danger"><a href="/login">ログイン画面へ</a></div>
</div>

@endsection
