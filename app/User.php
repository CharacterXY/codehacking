<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active', 'role_id', 'photo_id', 'isAdmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


   
   
    public function role(){

        return $this->belongsTo('App\Role');
    }

    
    
    public function isAdmin(){

        if($this->role->name == 'administrator' && $this->is_active == 1)
        {
            return true;
        }
        
        return false;
    }

    
    
    public function photo(){

        return $this->belongsTo('App\Photo');
    }

    
    /* public function setPasswordAttribute(){

        if(!empty($password))
        {
            $this->attributes['password'] = bcrypt($password);
        } 


    }   
 */

    public function posts(){

        return $this->hasMany('App\Post');

    }

  

}
