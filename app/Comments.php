<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{

    protected $fillable = ['post_id', 'user_id','comment_post'];    

    // relation to post
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    // relation to user
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
