<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Glob extends Model
{
	public function user(){

		return $this->belongsTo('App\User');
	}
	   public function uploads(){

        return $this->hasMany('App\Uploads');
    }

public function  likes(){
	return $this->hasMany('App\Like');
}

    }
