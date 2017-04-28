<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $filable = [
        'category',
        'parent_id',
        'parent',
        'child',
    ];


    public function post_meta()
    {
        return $this->belongsTo('App\PostMeta', 'meta_value');
    }
}
