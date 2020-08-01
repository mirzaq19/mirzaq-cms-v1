<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['judul','category_id','content','gambar','slug','excerpt','author','user_id','status'];

    public function category()
    {
        return $this->belongsTo('App\category');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag','posts_tags','posts_id','tags_id');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
