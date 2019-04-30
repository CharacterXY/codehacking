<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads = '/images/'; // Postavili smo folder i spojili ga s metodom getattribute da bude dinamicniji prikaz slike src=/images/


    
    protected $fillable = ['file'];

    public function getfileAttribute($photo)
    {
        return $this->uploads . $photo; 

  
    }
}
