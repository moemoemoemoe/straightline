<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
      public function res_pack(){
    	return $this->hasMany('App\Reservationpack');
    }
     public function cat(){
    	return $this->belongsTo('App\PackageCat');
    }
       public function hotel(){
    	return $this->belongsTo('App\Hotel');
    }
     public function city(){
    	return $this->belongsTo('App\City')->with('country');
    }
}
