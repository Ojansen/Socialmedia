<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
	protected $tabel = "likes";
    protected $primaryKey = 'Like_id';
    protected $fillable = ['Target_id', 'Like_id', 'User_id', 'isLiked'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function posts()
    {
        return $this->belongsTo('App\Posts');
    }
}
