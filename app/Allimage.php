<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allimage extends Model
{
    protected $table = 'all_image';
    protected $fillable = [
        'user_id', 'post_id', 'image_path', 'description',
    ];

    // relation to user
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    // relation to post
    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id');
    }
}
