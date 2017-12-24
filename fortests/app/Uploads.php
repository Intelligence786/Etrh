<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    protected $table='upload';
    
    public function user(){

		return $this->belongsTo('App\User');
	}

	  public function globs(){

        return $this->belongsTo('App\Glob');
    }
}
