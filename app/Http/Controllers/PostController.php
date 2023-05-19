<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

use GuzzleHttp\Client; // hotpepperここを追記


class PostController extends Controller
{
    public function index(Post $post, User $user)
    {
        $users = $user->get();
        $user_data = array(null);
        foreach ($users as $user){
            array_push($user_data, $user->name);
        }
 
        return view('posts/index' ,[
            'posts' => Post::latest('updated_at')->get(),
            'users' => $user_data,
        ]);
        //return view('posts/index')->with(['posts' => $post->get()])->with([]);
        //blade内で使う変数'posts'と設定。'posts'の中⾝にgetを使い、インスタンス化した$postを代⼊。
    }

    public function show(Post $post, User $user)
    {
        return view('posts/show', [
            'post' => $post,
            'user_name' => $user->find($post->user_id)->name,
        ]);
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
        //$request['post']と$request['station']を合体
        $data = $request['post'];
        $data['station'] = $request['station'];

        $input_post = $data + array('img_path' => $image_path) + array('user_id' => Auth::user()->id);

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

    //hotpepper
    // HTTPリクエストを送るURL
    private const REQUEST_URL = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/';
    // APIキー
    private $api_key;

    public function hotpepper(){
        $client = new Client(); // インスタンス生成
        $method = 'GET'; // HTTPリクエストメソッド
        $this->api_key = config('hotpepper.api_key'); // APIキーを取得
        // APIキーや検索ワードなどの設定を記述
        $options = [
            'query' => [
                'key' => config('hotpepper.api_key'),
                'keyword' => '新宿',
                'genre' => 'G013',
                'count' => 100,
                'format' => 'json',
            ],
        ];
        $response = $client->request($method, self::REQUEST_URL, $options); // HTTPリクエストを送信
        // 'format' => 'json'としたのでJSON形式でデータが返ってくるので、連想配列型のオブジェクトに変換
        $restaurants = json_decode($response->getBody(), true)['results'];
        // dd($restaurants);
        return view('hotpepper', ['restaurants' => $restaurants]);
    }

}