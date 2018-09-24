<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile_settings extends Model
{
	public $timestamps = false;
    protected $fillable = [
        'User_id','Title','Bio','Profile_picture', 'Profile_Extension', 'Header','Font_Color',
    ];
    protected $primaryKey = 'User_id';
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function Posts()
    {
    	return $this->belongsTo('App\Posts');
    }

}
