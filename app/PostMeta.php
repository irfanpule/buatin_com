<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    protected $table = 'post_meta';

    protected $fillable = [
        'meta_value', 'meta_key', 'post_id'
    ];

    // relation to Post
    public function post()
    {
        return $this->belongsTo('App\Post','post_id');
    }

    public function category()
    {
        return $this->hasOne('App\Categories', 'id','meta_value');
    }

}
