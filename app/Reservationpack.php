<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservationpack extends Model
{
      public function package(){
    	return $this->belongsTo('App\Packages')->with('cat');
    }
}
