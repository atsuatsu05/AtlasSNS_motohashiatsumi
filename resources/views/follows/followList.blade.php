@extends('layouts.login')

@section('content')
<div class="follow_container">
  <p>フォローリスト</p>
  <div class="following_icon">
    @foreach($following as $following)
    <a href="/profile/{{ $following->id }}"><img src="{{ asset('/storage/'.$following->images) }}" alt="フォローアイコン"></a>
    @endforeach
  </div>
</div>
<div class="following_post">
  <ul>
@foreach($posts as $post)
   <li>
    <div class="post_icon">
      <img src="{{ asset('storage/'.$post->user->images) }}">
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
