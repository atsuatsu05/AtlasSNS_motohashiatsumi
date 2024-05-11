@extends('layouts.login')

@section('content')
<div class="search_container">
  <form action="/search" method="post">
    @csrf
    <input type="text" name="keyword" class="search_form" placeholder="ユーザー名" value="{{ $keyword }}">
    <button type="submit" ><img src="{{ asset('images/search.png') }}" art="検索"></button>
  </form>
  @if(!empty($keyword))
  <div class="search_word">
    <p>検索ワード：{{ $keyword }}</p>
  </div>
  @endif
</div>
<!-- ユーザー一覧の表示 -->
<div class="users_list">
<!-- 自分以外のユーザーを表示する -->
@foreach($users as $user)
@if ($user->id !== Auth::user()->id)
<ul>
  <li><img src="{{asset('storage/'.$user->images) }}" alt="ユーザーアイコン" width="64" height="64"></li>
  <li><p>{{ $user->username }}</p></li>
  @if(auth()->user()->isFollowing($user->id))
  <!-- フォローボタン・解除ボタン -->
  <form action="/unfollow" name="followed_id" value="{{ $user->id }}">

    @csrf
    <input type="hidden" name="followed_id" value="{{ $user->id }}">
    <button name="submit" class="btn btn-danger">フォロー解除</button>
  </form>
  @else
  <form action="/follow" method="post">
    @csrf
    <input type="hidden" name="follow_id" value="{{ $user->id }}">
     <button name="submit" class="btn btn-info">フォローする</button>
  </form>
  @endif


  {{Form::hidden('follow_id',$user->id)}}
  {!! Form::close() !!}
</ul>
@endif
@endforeach
</div>
@endsection
