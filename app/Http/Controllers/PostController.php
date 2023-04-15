<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->get()]);
        //blade内で使う変数'posts'と設定。'posts'の中⾝にgetを使い、インスタンス化した$postを代⼊。
    }

    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
        //'post'はbladeファイルで使う変数。中⾝は$postはid=1のPostインスタンス。
    }

    public function create()
    {
        return view('posts/create');
    }
    
    //
    public function store(Request $request, Post $post)
    {
        //s3アップロード開始
        $image = $request->file('image');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('img', $image, 'public');
        // アップロードした画像のフルパスを取得
        $image_path = Storage::disk('s3')->url($path);


        $input_post = $request['post'] + array('img_path' => $image_path);

        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}