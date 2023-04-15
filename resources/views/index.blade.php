<!DOCTYPE html>
<<<<<<< HEAD
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body class="antialiased">
        
        <h1>aaaaa</h1>

        <form action="/create" method="post" enctype="multipart/form-data">
            @csrf
                <!-- アップロードフォームの作成 -->
                <input type="file" name="image">
                <input type="submit" value="アップロード">
        </form>


    </body>
</html>
=======
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>ララベル試し</title>
    </head>
    <body>
        <h1>ララベル試しホーム</h1>

        <img src="{{ asset('images/inu.jpeg') }}" alt="inu">

        <h2>以下からページに飛べます</h2>
        <a href="{{url('/ｐ１')}}">p1</a>
        <a href="{{url('/ｐ２')}}">p2</a>
        <a href="{{url('/ｐ３')}}">p3</a>
    </body>
</html>
>>>>>>> origin/main
