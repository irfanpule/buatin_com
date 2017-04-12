<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    protected $table = 'post_meta';

    protected $fillable = [
        'meta_value', 'meta_key', 'post_id'
    ];
}
