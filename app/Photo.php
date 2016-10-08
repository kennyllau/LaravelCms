<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['file'];

    protected $uploads = '/images/';

    // making img src in index page more dynamic
    public function getFileAttribute($photo){

    	return $this->uploads. $photo;

    }

}
