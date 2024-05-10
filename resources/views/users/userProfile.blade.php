@extends('layouts.login')

@section('content')
<div class="user_container">
  @foreach($users_profile as $users_profile)
  <div class="user_profile">
    <p><img src="{{ asset('/storage/'.$users_profile->images) }}" alt="フォローアイコン"></p>
    <div class="profile_box"><!-- ユーザー名・自己紹介を縦並びにする -->
    <div class="username">
      <h2>ユーザー名</h2>
      <p>{{ $users_profile->username }}</p>
    </div>
    <div class="bio">
      <h2>自己紹介</h2>
      <p>{{ $users_profile->bio }}</p>
    </div>
    </div><!-- end ユーザー名・自己紹介を縦並びにする -->
  @if(auth()->user()->isFollowing($users_profile->id))
  <!-- フォローボタン・解除ボタン -->
  <form action="/unfollow" name="followed_id" value="{{ $users_profile->id }}">

    @csrf
    <input type="hidden" name="followed_id" value="{{ $users_profile->id }}">
    <button name="submit" class="btn btn-danger">フォロー解除</button>
  </form>
  @else
  <form action="/follow" method="post">
    @csrf
    <input type="hidden" name="follow_id" value="{{ $users_profile->id }}">
     <button name="submit" class="btn btn-info">フォローする</button>
  </form>
  @endif

  </div>
  @endforeach
</div>
<div class="user_posts">
  <ul>
  @foreach($posts as $post)
   <li>
    <div class="post_block">
    <div class="post_icon">
      <img src="{{ asset('/storage/'.$post->user->images) }}" alt="ユーザーアイコン">
    </div>
    <div class="post_content">
      <div><!-- ユーザー名と作成日を横並びにする -->
        <p class="post_name">{{ $post->user->username }}</p>
        <p class="post_created">{{ $post->created_at->format('Y-m-d H:i') }}</p>
      </div>
   <p class="post_list">{{ $post->post }}</p>
   </div><!-- end post_block -->


</div><!-- end userprofile_container -->

   </li>
  @endforeach

  </ul>
</div>
@endsection
