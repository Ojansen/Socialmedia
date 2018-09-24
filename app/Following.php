<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Following extends Model
{
	protected $table = "followings";
    protected $primaryKey = 'User_id';
    protected $fillable = ['User_id','Target_id'];

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function Posts()
    {
    	return $this->belongsTo('App\Posts');
    }
}
