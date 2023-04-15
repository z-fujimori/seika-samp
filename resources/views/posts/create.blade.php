<!DOCTYPE>
<html lang="{{str_replace('_', '-', app()->getLocale()) }}"
    <head>
        <meta charset="utg-8">
        <title>投稿作成</title>
        <link rel="stylesheet" href="{{ asset('/style.css')  }}" >

    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="post[title]" placecholder="OO家" value="{{ old('post.title')}}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>本文</h2>
                <textarea name="post[body]" placecholder="ここのラーメンはおいしかった">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="image">
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <input type="submit" value="投稿"/>
        </from>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
