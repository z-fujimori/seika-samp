<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('/style.css')  }}" >
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

    <h1>Blog Name</h1>

    @guest
    @else
        <div>
            <a href="/posts/create">投稿作成</a>
        </div>
        <p>{{ Auth::user()->name }}</p>
    @endguest

    <div class='posts'>
        
        @foreach ($posts as $post)
            <div class='post'>
                <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <p class='body'>{{ $post->body }}</p>
            </div>
        @endforeach
        
    </div>
</body>
</html>