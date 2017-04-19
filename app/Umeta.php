<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umeta extends Model
{
    protected $table = 'umeta';

    protected $fillable = [
        'meta_value', 'meta_key', 'user_id'
    ];

    // relation to user
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
