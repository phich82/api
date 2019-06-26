<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    public function arrivalflights()
    {
        return $this->hasMany('App\Flight', 'arrival_airport_id');
    }

    public function departureflights()
    {
        return $this->hasMany('App\Flight', 'departure_airport_id');
    }
}
