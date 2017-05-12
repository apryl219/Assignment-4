<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function actor() {
    		
    		return $this->belongsTo('App\Actor');
    	}

    public function genres() {

    	return $this->belongsToMany('App\Genre')->withTimestamps();
    }
}
