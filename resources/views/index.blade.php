<!DOCTYPE html>
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
