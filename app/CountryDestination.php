<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryDestination extends Model {
    //
    protected $fillable = ['title', 'imagename', 'duration', 'difficulty', 'price', 'highlights', 'tripintroduction', 'frontdest', 'topdest', 'slug'];
    public function country() {
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }
    public function bookings() {
        return $this->hasMany('App\Booking', 'cd_id', 'id');
    }
}
