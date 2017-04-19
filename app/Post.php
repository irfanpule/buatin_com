<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'user_id', 'post_title', 'post_content', 'price_start', 'price_end', 'post_status',
    ];
    
    // relation to user
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    // relation to Post Meta
    public function post_metas()
    {
        return $this->hasMany('App\PostMeta');
    }

    // relation to All Image
    public function allimages()
    {
        return $this->hasMany('App\Allimage');
    }
}
