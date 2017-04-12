<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allimage extends Model
{
    protected $table = 'all_image';
    protected $fillable = [
        'user_id', 'post_id', 'image_path', 'description',
    ];

}
