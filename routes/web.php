<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function () {
    return view('index');
});

Route::get('/ｐ１',function () {
    return view('ｐ１');
});

Route::get('/ｐ２',function () {
    return view('ｐ２');
});

Route::get('/ｐ３',function () {
    return view('ｐ３');
});
//コメントアウトを追加
?>