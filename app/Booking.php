<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable=['bookeddate','nop','bookedname','bookedemail','bookedemail','bookedphone','message','bookedcountry','status'];
    //
    public function destination()
    {

        return $this->belongsTo('App\CountryDestination','cd_id','id');
    }
}
