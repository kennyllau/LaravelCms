<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'photo_id', 'title', 'body', 'category_id'];

    public function user(){

    	return $this->belongsTo('App\User');

    }

    public function photo(){

    	return $this->belongsTo('App\Photo');

    }

    public function category(){

    	return $this->belongsTo('App\Category');

    }

    public function comments(){

        return $this->hasMany('App\Comment');

    }
}
