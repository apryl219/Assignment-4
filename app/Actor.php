<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    public function movies() {
    		
    		return $this->hasMany('App\Movie');
    	}

    public static function getActorsForDropdown() {
    	 # Get all the authors
        $actors = Actor::orderBy('last_name', 'ASC')->get();

        # Organize the authors into an array where the key = author id and value = author name
        $actorsForDropdown = [];
        foreach($actors as $actor) {
            $actorsForDropdown[$actor->id] = $actor->last_name.', '.$actor->first_name;
        }

        return $actorsForDropdown;
    }
}
