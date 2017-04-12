<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'user_id', 'post_title', 'post_content', 'price_start', 'price_end', 'post_status',
    ];
    
}
