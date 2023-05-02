<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>麺stagram</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('/style.css')  }}" >
    <link rel="stylesheet" href="/css/preview.css" >

    <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
</head>
<body>
    @guest
        <div class='login'>
                <a href="{{ route('login') }}">ログイン</a>
                <a href="{{ route('register') }}">ユーザー登録</a>
        </div>
    @else
        <div class='login'>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        ログアウト</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>
    @endguest

    <h1>麺stagram</h1>

    @guest
    @else
        <div>
        <a href="/posts/create" class="font-size-a">投稿作成</a>        </div>
    @endguest

    <div class='posts'>
        
        @foreach ($posts as $post)
            <div class='post'>
                <!--<div class="divide">-->
                    <div class="prat">
                        <h2 class='title'>
                            <a href="/posts/{{ $post->id }}">{{ $post->shop_name }}</a>
                        </h2>
                        <p class='ra-men'>商品：{{ $post->ramen_name }}</p>
                        <p class='body'>内容：{{ $post->body }}</p>
                        <p class='user'>投稿者：{{ $users[$post->user_id] }}</p>
                        @if($post->station != null)
                            <p class="tug">{{ $post->station }}</p>
                        <div><h4></h4></div>
                        @endif
                    </div>
                    <div class="part">
                        <img src= {{ $post->img_path }} class="show_img">
                    </div>
                <!--</div>-->
            </div>
            
        @endforeach
        
    </div>
</body>
</html>