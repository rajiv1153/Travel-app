<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
 protected $fillable=['countryname','imagename','slug'];
 public static function boot()
 {
     parent::boot();
     self::deleting(function(Country $country) {
        foreach($country->countrydestinations()->get() as $dest)
        {
         $dest->delete();
         unlink(public_path().'/'.'countrydestimage/'. $dest->imagename);


        }
       });
}
 public function countrydestinations()
 {

    return $this->hasMany('App\CountryDestination','country_id','id');
 }

}
