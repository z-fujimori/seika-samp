<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('index');
});



Route::post('/create', [PostController::class, 'store']);
*/

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}', [PostController::class ,'show']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class,'delete']);

Auth::routes();

=======

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
>>>>>>> origin/main
?>