<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtags extends Model
{
    public function posts()
    {
        return $this->belongsTo('App\Posts');
    }
}

