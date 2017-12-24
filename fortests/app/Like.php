<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user(){
    	return $this->belongTo('App\User');
    }

      public function glob(){
    	return $this->belongTo('App\Glob');
    }
}
