<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umeta extends Model
{
    protected $table = 'umeta';

    protected $fillable = [
        'meta_value', 'meta_key', 'user_id'
    ];

}
