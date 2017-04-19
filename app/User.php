<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','display_name', 'email', 'password', 'provider', 'provider_id', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // relation one to many to post
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    // relation to umeta
    public function umetas()
    {
        return $this->hasMany('App\Umeta');
    }

    // relation to All Image
    public function allimages()
    {
        return $this->hasMany('App\Allimage');
    }
}
