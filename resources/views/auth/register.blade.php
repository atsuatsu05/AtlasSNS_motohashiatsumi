@extends('layouts.logout')

@section('content')
{!! Form::open(['url' => '/register']) !!}
{{ csrf_field() }}
<h2>新規ユーザー登録</h2>

<!-- バリデーションのエラーメッセージを表示させる -->
@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input'],['value' => 'old("username")']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input'],['value' => 'old("mail")']) }}

{{ Form::label('パスワード') }}
{{ Form::password('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}

<button type="submit" class="btn btn-danger">新規登録</button>

<div class="return">
<p><a href="/login">ログイン画面へ戻る</a></p>
</div>
{!! Form::close() !!}


@endsection
