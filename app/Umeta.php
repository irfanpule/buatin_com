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

    // relation to post
    public function post()
    {
        return $this->belongsToMany('App\User', 'user_id', 'user_id');
    }

    // relation to DKabKota
    public function kab_kota()
    {
        return $this->hasOne('App\DKabKota', 'id_kab', 'meta_value');
    }



}
