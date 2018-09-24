<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = "posts";
    protected $primaryKey = 'Post_id';
    protected $fillable = [
        'Post_id', 'created_at', 'updated at','Text_title','Text_body','Link_url','Link_title','Chat_title','Chat_body','Audio_url','Audio_file_id','Audio_external','Post_type','User_id',
        'Foto','Foto_sizeKB', 'poll_naam', 'poll_yes', 'poll_no',
    ];
    public function user()
    {
        return $this->belongsTo('App\User','User_id','id');
    }
    public function likes()
    {
        return $this->hasMany('App\Likes', 'Target_id', 'Post_id');
    }
    public function comments()
    {
        return $this->hasMany('App\Comments', 'Post_id', 'Post_id');
    }
    public function hashtags()
    {
        return $this->hasMany('App\Hashtags');
    }
    public function following()
    {
        return $this->hasMany('App\Following', 'User_id', 'id');
    }
    public function profile()
    {
        return $this->hasMany('App\Profile_settings', 'User_id', 'id');
    }
}
