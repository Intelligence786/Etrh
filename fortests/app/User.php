<?php

namespace App;

use App\Traits\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
    use Notifiable;

    use Friendable;

      use Messagable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login','name','last_name','gender', 'dirthdate_day','dirthdate_month','dirthdate_year', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
    ];


    public function globs(){

        return $this->hasMany('App\Glob');
    }

      public function uploads(){

        return $this->hasMany('App\Uploads');
    }


    public function  likes(){
    return $this->hasMany('App\Like');
}

}
