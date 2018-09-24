<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'nickname', 'email', 'gender', 'birthday', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Posts', 'User_id', 'id');
    }

    public function followers()
    {
        return $this->hasMany('App\Followers', 'User_id', 'id');
    }

    public function following()
    {
        return $this->belongsToMany('App\Following', 'User_id', 'id');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile_settings', 'User_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments', 'User_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany('App\Likes', 'User_id', 'id');
    }
    
    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}
