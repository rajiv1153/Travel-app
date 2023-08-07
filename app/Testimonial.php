<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model {
    protected $fillable = ['name', 'testiment', 'rating', 'country', 'image_name'];
}
