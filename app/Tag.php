<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // create mass assignment so Tag model can be linked to many other models
    protected $fillable = ['name'];
}
