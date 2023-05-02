<!DOCTYPE>
<html lang="{{str_replace('_', '-', app()->getLocale()) }}"
    <head>
        <meta charset="utg-8">
        <title>投稿作成</title>
        <link rel="stylesheet" href="{{ asset('/style.css')  }}" >
        <link rel="stylesheet" href="/css/preview.css" >
        <style>
            input[type=radio] {display: none; /* ラジオボタンを非表示にする */}
        </style>
        <!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
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
                            ログアウト
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        @endguest
        <h1>Blog Name</h1>
        <div class="content" align="center">
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="title">
                    <h2>店名</h2>
                    <input type="text" name="post[shop_name]" placecholder="OO家" value="{{ old('post.shop_name')}}" class="text-size-in"/>
                    <p class="title__error" style="color:red">{{ $errors->first('post.shop_name') }}</p>
                </div>
                <div class="ra-men">
                    <h2>食べたラーメン</h2>
                    <input type="text" name="post[ramen_name]" placecholder="チャーシューラーメン" value="{{ old('post.ramen_name')}}" class="text-size-in"/>
                    <p class="title__error" style="color:red">{{ $errors->first('post.ramen_name') }}</p>
                <div class="body">
                    <h2>本文</h2>
                    <textarea id="text-in" class="textarea" name="post[body]" placeholder="ここのラーメンはおいしかった" oninput="textAreaHeightSet(this)"
                        onchange="textAreaHeightSet(this)">{{ old('post.body') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <div class="image">
                    <div class="preview">
                        <input type="file" id="image" name="image" accept="image/*" class="upload-limit">
                        <img id="file-preview" class="file-preview">
                    </div>
                </div>

                <div class="station">
                    <p>近くの駅</p>
                        <input type="radio" name="station" id="hachiouji" value="八王子駅" onclick="radioDeselection(this, 1)">
                        <label for="hachiouji" class="label">八王子駅</label>
                        <input type="radio" name="station" id="sinjyuku" value="新宿駅" onclick="radioDeselection(this, 2)">
                        <label for="sinjyuku" class="label">新宿駅</label>
                </div>
                

                <input type="submit" value="投稿" class="button-size"/>
            </from>
        </div>
        
        <div class="footer">
            <a href="/" class="font-size-b">戻る</a>
        </div>


        
        <script>
            function textAreaHeightSet(argObj){
                argObj.style.height = "10px";
                var wSclollHeight = parseInt(argObj.scrollHeight);
                var wLineH = parseInt(argObj.style.lineHeight.replace(/px/, ''));
                if(wSclollHeight < (wLineH * 2)){wSclollHeight=(wLineH * 2);}
                argObj.style.height = wSclollHeight + "px";
            }
        </script>

        <script src="{{ asset('/img.js')  }}"></script>
    </body>
</html>
