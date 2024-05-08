@extends('layouts.login')

@section('content')

<div class="container">
  <!--バリデーションの表示-->
@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

  {!! Form::open(['url' => '/posts/create']) !!}
  <div class="post_container">
    <p><img src="{{ asset('storage/'.Auth::user()->images) }}"></p>
    {{ Form::textarea('newPost',null,['class' => 'post_text' , 'style' => 'white-space:pre-wrap', 'placeholder' => '投稿内容を入力してください。' ]) }}
    <input type="image" name="submit" class="submit_btn" src="{{ asset('images/post.png') }}" alt="投稿ボタン">
  </div>
  {!! Form::close() !!}
</div>

<!-- 投稿画面一覧を表示させる -->

<div class="posts_container">
 <ul>
  @foreach($list as $list)
  <li>
  <div class="post_block">
   <div class="post_icon">
    <img src="{{ asset('storage/'.$list->user->images) }}">
   </div>
  <div class="post_content">
    <div> <!-- ユーザー名と作成日を横並びにする -->
    <div class="post_name">{{ $list->user->username }}</div>
    <div class="post_created">{{ $list->created_at->format('Y-m-d H:i') }}</div>
    <!-- ,($list->created_at) -->
    </div> <!-- end ユーザー名と作成日を横並びにする -->
    <div class="post_list">{{ $list->post }}</div>
  </div><!-- end post_content -->
  </div><!-- end post_block -->

  @if(Auth::user()->id == $list->user_id)<!-- ログインのIDとpostsテーブルのuser_idが同じだったら編集・削除ボタンを表示させる-->
  <!-- 投稿の編集・削除ボタン設置 -->
  <div class="post_block">
  <div class="post_option">
    <div class="btn_edit">
    <a class="js_modal_open" href="/top" post="{{ $list->post }}" post_id="{{ $list->id }}"><img src="{{ asset('images/edit.png') }}" alt="編集"></a></div>
    <div class="btn_trash"><a href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
    </a></div>
  </div>
  </div>

  @endif

  </li>

  @endforeach

  <!-- 投稿の編集モーダル画面 -->
  <div class="modal js_modal">
    <div class="modal__bg js_modal_close"></div>
    <div class="modal__content">
      <form action="/top" method="post">
        <textarea name="upPost" class="modal_post"></textarea>
        <input type="hidden" name="postId" class="modal_id" value="">
        <div align="center">
        <input type="image" name="submit" class="update_btn" src="{{ asset('images/edit.png') }}" value="更新">
        <!-- 不要？？<a class="js_modal_close" href="/top" alt="閉じる"></a> -->
        </div>
        {{ csrf_field() }}

      </form>

    </div>
  </div>
  <!-- end　投稿の編集モーダル画面 -->
 </ul>
</div>


@endsection
