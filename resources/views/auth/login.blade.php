@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}

<p>AtlasSNSへようこそ</p>
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

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

<!-- {{ Form::submit('ログイン') }} -->
<button type="submit" class="btn btn-danger">ログイン</button>

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
