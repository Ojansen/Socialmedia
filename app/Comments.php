<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $primaryKey = 'Comment_id';
    protected $fillable = [	'Comment_id', 'Comment', 'created_at','updated_at','Post_id' ,'User_id'];
    public function user()
    {
        return $this->belongsTo('App\User', 'User_id', 'id');
    }
    public function posts()
    {
        return $this->belongsTo('App\Posts');
    }
}   
