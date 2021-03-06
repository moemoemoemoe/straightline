<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function city(){
    	return $this->belongsTo('App\City')->with('country');
    }
}
