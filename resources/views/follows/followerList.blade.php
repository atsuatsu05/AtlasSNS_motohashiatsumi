@extends('layouts.login')

@section('content')
<div class="follow_container">
  <p>フォローワーリスト</p>
  <div class="followed_icon">
    @foreach($followed as $followed)
    <a href="/profile/{{ $followed->id }}"><img src="{{ asset('/storage/'.$followed->images) }}" alt="フォローアイコン" width="64" height="64"></a>
    @endforeach
  </div>
</div>
<div class="followed_post">
  <ul>
@foreach($posts as $post)
   <li>
    <div class="post_icon">
      <img src="{{ asset('storage/'.$post->user->images) }}" width="64" height="64">
    </div>
    <div class="post_content">
      <div><!-- ユーザー名と作成日を横並びにする -->
        <p class="post_name">{{ $post->user->username }}</p>
        <p class="post_created">{{ $post->created_at->format('Y-m-d H:i') }}</p>
      </div>
      <p class="post_list">{{ $post->post }}</p>
    </div>

   </li>
@endforeach
  </ul>
</div>
@endsection
