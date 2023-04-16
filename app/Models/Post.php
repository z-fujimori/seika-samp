<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
    'title',
    'body',
    'img_path',
    'user_id',
    'station',
    ];
    
    /*
    public function users(){
        return $this->hasMany('app\Models\Users');
    }
    */
}    



?>
