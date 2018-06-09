<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name'];
    // link the Post model to the Tag model
    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }

}
