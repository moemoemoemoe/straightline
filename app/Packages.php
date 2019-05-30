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
     
}
