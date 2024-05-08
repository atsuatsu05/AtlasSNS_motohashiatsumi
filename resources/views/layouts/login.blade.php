<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <!-- BootstrapをCDN経由で導入 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->


</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img src="{{ asset('images/atlas.png') }}"></a></h1>
        <div id="user">
             <div id="user-top">
                    <p>{{ Auth::user()->username }}　さん</p>
                <!-- アコーディオンメニュー実装 -->
                    <p class="accordion_btn"></p>
                <div class="accordion_container">
                <ul>
                    <li class="accordion_text"><a href="/top">ホーム</a></li>
                    <li class="accordion_text"><a href="/profile">プロフィール編集</a></li>
                   <li class="accordion_text"> <a href="/logout">ログアウト</a></li>
                </ul>
                </div>
            </div>
            <p id="user_icon"><img src="{{ asset('storage/'.Auth::user()->images) }}"></p>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>

                <p class="btn btn-primary"><a href="/follow-list">フォローリスト</a></p>

                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>

                <p class="btn btn-primary"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <button type="button" class="btn btn-primary"><a href="/search">ユーザー検索</a></button>
        </div>
    </div>
    <footer>
    </footer>
    <!-- BootstrapをCDN経由で導入 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
