<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ホットペッパーAPI</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>店舗名</th>
            <th>営業時間</th>
        </tr>
        @for ($i = 0; $i < $restaurants['results_returned']; $i++)
            <tr>
                <td><a href="{{{ $restaurants['shop'][$i]['urls']['pc'] }}}">{{{ $restaurants['shop'][$i]['name'] }}}</a></td>
                <td>{{{ $restaurants['shop'][$i]['open'] }}}</td>
            </tr>
        @endfor
    </table>
</body>
</html>