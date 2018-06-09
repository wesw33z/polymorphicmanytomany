<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['name'];
    // link the Video model to the Tag model
    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
