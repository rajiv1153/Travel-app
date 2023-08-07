<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model {
    protected $fillable = ['title', 'content', 'price', 'slug', 'image_name'];
}
