<?php

namespace App;

use Laravel\Scout\Searchable;   
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // scout
    use Searchable;


    protected $table = 'posts';

    protected $fillable = [
        'user_id', 'post_title', 'post_content', 'price_start', 'price_end', 'post_status',
    ];
    
    // relation to user
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    // relation to user meta
    public function umetas()
    {
        return $this->hasMany('App\Umeta', 'user_id', 'user_id');
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



    /*
     * algolia search array
     * this for index relation model
     */
    public function toSearchableArray()
    {

        $data = $this->toArray();
        $data['user'] = $this->user->toArray();
        $data['user_metas'] = $this->umetas->toArray();
        $data['post_metas'] = $this->post_metas->toArray();

        return $data;
    }
}
