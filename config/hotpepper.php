<?php

return [
    'api_key' => env('HOTPEPPER_API_KEY')
];

/**
 * 本番環境で　env.ファイルは読み込まれないので、config配下にhotpepper.phpを作成。
 *ModelやContorllerから、configメソッドで呼び出せるように
 *これでconfig('hotpepper.api_key')でどこからでも呼び出せるように
 */