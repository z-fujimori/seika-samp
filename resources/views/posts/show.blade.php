<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('/style.css')  }}" >
    <link rel="stylesheet" href="/css/preview.css" >

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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
    <h1 class="title">
        ラーメン・つけ麺、、、
        
    </h1>
    <div class="content" align="center">
        <div class="content__post">
            <h3>
                {{ $post->title }}
                {{ $user_name }}
            </h3>
            <p>{{ $post->body }}</p>
            
        </div>
        <div class="img">
            <img src= {{ $post->img_path }} class="show_img">
        </div>
        <p class="tug">{{ $post->station }}</p>
    </div>


    @guest
    @else
    <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
    <div class="delete">
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
        </form>
        <script>
            function deletePost(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </div>
    @endguest
    <div class="footer">
        <a href="/">戻る</a>
    </div>
</body>
</html>