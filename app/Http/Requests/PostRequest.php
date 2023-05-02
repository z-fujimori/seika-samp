<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class PostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'post.shop_name' => 'required|string|max:100',
            'post.ramen_name' => 'required|string|max:100',
            'post.body' => 'required|string|max:4000',
            'post.img_path',
            'post.station',
        ];
    }
}
